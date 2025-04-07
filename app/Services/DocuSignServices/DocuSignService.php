<?php

namespace App\Services\DocuSignServices;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DocuSign;
use App\Models\DProjectDocument;
use App\Services\DDocumentServices\DDocumentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use App\Models\DProject;
use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Api\EnvelopesApi\CreateEnvelopeOptions;
use DocuSign\eSign\Client\ApiClient;
use DocuSign\eSign\Client\ApiException;
use DocuSign\eSign\Configuration;
use DocuSign\eSign\Model\Document;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\RecipientIdentityInputOption;
use DocuSign\eSign\Model\RecipientIdentityPhoneNumber;
use DocuSign\eSign\Model\RecipientIdentityVerification;
use DocuSign\eSign\Model\Recipients;
use DocuSign\eSign\Model\RecipientSMSAuthentication;
use DocuSign\eSign\Model\Signer;
use Illuminate\Support\Facades\Cache;


class DocuSignService
{
    //DocuSign
    protected $settings = [];

    protected $docuSign;

    protected $envelopesApi;

    public $documentsToSign = [];

    public $signers = [];

    protected $envelopeDefinition;

    protected $apiClient;

    protected $signHereTabs = [];

    public function __construct()
    {
        $this->docuSign = Cache::rememberForever('docusign', function () {
            return DocuSign::first();
        });
        $this->settings = [
            'client_id' => config('docusign.client_id'),
            'integrator_key' => config('docusign.integrator_key'),
            'user_id' => config('docusign.user_id'),
            'client_secret' => config('docusign.client_secret'),
            'account_id' => config('docusign.account_id'),
            'base_uri' => config('docusign.base_uri'),
            'auth_uri' => config('docusign.auth_uri'),
            'auth_server' => config('docusign.auth_server'),
            'redirect_uri' => config('docusign.redirect_uri'),
        ];
    }

    public function createEnvelope(): string
    {
        $envelopesApi = $this->getEnvelopesApi();

        $envelopeDefinition = $this->getEnvelopeDefinition();

        try {
            $envelopeSummary = $envelopesApi->createEnvelope(
                $this->settings['account_id'],
                $envelopeDefinition,
                new CreateEnvelopeOptions()
            );

            return $envelopeSummary->getEnvelopeId();
        } catch (ApiException $e) {
            throw new CustomException('Error creating envelope: ' . $e->getMessage());
        }
    }

    public function envelopeSigned($envelope)
    {
        // if ($envelope['event'] !== 'signing_complete') {
        //     return;
        // }

        $projectDocument = DProjectDocument::where(
            'envelope_id',
            $envelope['data']['envelopeId']
        )->get();

        if ($projectDocument->isEmpty()) {
            return;
        }

        $project = DProject::find($projectDocument[0]->d_project_id);
        $envelope_api = $this->getEnvelopesApi();
        foreach ($projectDocument as $document) {
            $temp_file = $envelope_api->getDocument(
                $this->settings['account_id'],
                "$document->id",
                $envelope['data']['envelopeId']
            );

            // Use a temporary directory
            $tempDir = sys_get_temp_dir();
            $newFilePath = $tempDir . DIRECTORY_SEPARATOR . $document->pDocument->entitled . '.pdf';

            // Ensure the directory is writable
            if (!is_writable($tempDir)) {
                throw new \Exception("Temporary directory is not writable: $tempDir");
            }

            copy($temp_file->getPathname(), $newFilePath);
            $temp_file = new \SplFileInfo($newFilePath);

            (new DDocumentService())->attachDocuments(
                $project,
                [
                    'file' => $temp_file,
                    'name' => $document->name,
                    'type_doc' => $document->type_doc,
                ],
                'd_project_id',
                $document->pDocument
            );
            unlink($temp_file->getPathname());
        }
    }

    public function getEnvelopesApi(): EnvelopesApi
    {
        if (! $this->envelopesApi) {
            $this->setEnvelopesApi();
        }

        return $this->envelopesApi;
    }

    public function setEnvelopesApi(): void
    {
        $config = new Configuration();
        $config->setHost($this->settings['base_uri']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . $this->getAccessToken());
        $config->setSSLVerification(false);
        $apiClient = new ApiClient($config);
        $this->envelopesApi = new EnvelopesApi($apiClient);
    }

    public function getApiClient()
    {
        if (! $this->apiClient) {
            $this->setApiClient();
        }

        return $this->apiClient;
    }

    public function setApiClient()
    {
        $config = new Configuration();
        $config->setHost($this->settings['base_uri']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . $this->getAccessToken());
        $config->setSSLVerification(false);
        $this->apiClient = new ApiClient($config);
    }

    public function getEnvelopeDefinition(): EnvelopeDefinition
    {
        return $this->envelopeDefinition;
    }

    public function setEnvelopeDefinition($emailSubject = ' '): void
    {
        $this->envelopeDefinition = new EnvelopeDefinition([
            'email_subject' => $emailSubject,
            'status' => 'sent',
        ]);
        $this->addDocumentsToEnvelope();
        $this->addSignersToEnvelope();
    }

    public function addDocumentsToEnvelope(): void
    {
        $this->envelopeDefinition->setDocuments($this->documentsToSign);
    }

    public function addSignersToEnvelope(): void
    {
        $this->envelopeDefinition->setRecipients(new Recipients([
            'signers' => $this->signers,
        ]));
    }

    public function addDocumentToSignList($documents): void
    {
        foreach ($documents as $document) {
            $this->documentsToSign[] = $this->getDocument($document);
        }
    }

    public function addSigner(
        $signerName,
        $signerEmail,
        $id
    ): void {
        $this->signers[] = $this->getSigner(
            $signerName,
            $signerEmail,
            $id
        );
    }

    public function getSigner($signerName, $signerEmail, $id): Signer
    {
        $signer = new Signer([
            'email' => $signerEmail,
            'name' => $signerName,
            'recipient_id' => "$id",
            'routing_order' => "$id",
        ]);

        return $signer;
    }

    public function addSignHereTabsToDocument($document, $tabs, $signer)
    {
        foreach ($tabs as $tab) {
            $this->signHereTabs[] = $this->getSignHereTab($tab, $document, $signer);
        }
    }

    public function setTabs($signer)
    {
        $signer->setTabs(new \DocuSign\eSign\Model\Tabs([
            'sign_here_tabs' => $this->signHereTabs,
        ]));
        $this->signHereTabs = [];
    }

    public function getSignHereTab($tab, DProjectDocument $document, $user)
    {
        return new \DocuSign\eSign\Model\SignHere([
            'document_id' => "$document->id",
            'page_number' => $tab['sign_page'],
            'recipient_id' => $user->getUserId(),
            'tab_label' => 'Signer ici',
            'x_position' => $tab['x'],
            'y_position' => $tab['y'],
        ]);
    }

    public function getDocument(DProjectDocument $document): Document
    {
        return new Document([
            'document_base64' => base64_encode(file_get_contents(
                storage_path('app/' . $document->path)
            )),
            'name' => $document->name,
            'file_extension' => 'pdf',
            'document_id' => "$document->id",
        ]);
    }

    public function getAccessToken()
    {
        return $this->docuSign->access_token;
    }

    public function refreshAccessToken()
    {
        $privateKey = openssl_pkey_get_private(
            file_get_contents(config('docusign.private_key_path'))
        );

        $header = json_encode(['typ' => 'JWT', 'alg' => 'RS256']);

        $payload = json_encode([
            'iss' => config('docusign.integrator_key'),
            'sub' => config('docusign.client_id'),
            'iat' => time(),
            'exp' => time() + (60 * 60),
            'aud' => config('docusign.auth_server'),
            'scope' => 'signature impersonation',
        ]);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $tokenPart = $base64UrlHeader . '.' . $base64UrlPayload;

        openssl_sign($tokenPart, $signature, $privateKey, OPENSSL_ALGO_SHA256);

        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        $jwt = $tokenPart . '.' . $base64UrlSignature;

        $response = Http::withoutVerifying()->asForm()->withHeaders([
            'Authorization' => 'Bearer ' . $jwt,
        ])->post(config('docusign.auth_uri') . '/oauth/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        if ($response->badRequest()) {
            return;
        }
        $data = $response->json();
        DocuSign::firstOrCreate()->update([
            'access_token' => $data['access_token'],
            'expires_at' => now()->addSeconds($data['expires_in']),
        ]);
    }

    public function resendEnvelope($envelopeId)
    {
        $config = new Configuration();
        $config->setHost($this->settings['base_uri']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . $this->getAccessToken());
        $config->setSSLVerification(false);
        $apiClient = new ApiClient($config);
        $envelopesApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);
        $envelopesApi->update($this->settings['account_id'], $envelopeId, ["resend" => true]);
    }

    public function getAccountIdentityVerification()
    {

        $config = new Configuration();
        $config->setHost($this->settings['base_uri']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . $this->getAccessToken());
        $config->setSSLVerification(false);
        $apiClient = new ApiClient($config);
        $accountApi = new \DocuSign\eSign\Api\AccountsApi($apiClient);
        $response = $accountApi->getAccountIdentityVerification($this->settings['account_id']);

        DocuSign::first()->update([
            'workflow_id' => $response->getIdentityVerification()[0]->getWorkflowId(),
        ]);
    }


    public function setIdentityVerification($signer, $phoneNumber)
    {
        // Remove spaces
        $phoneNumberNoSpaces = str_replace(' ', '', $phoneNumber);

        // Get substring from the third character
        $substring = substr($phoneNumberNoSpaces, 3);
        $phoneNumber = new RecipientIdentityPhoneNumber();
        $phoneNumber->setCountryCode('33');
        $phoneNumber->setNumber($substring);
        $inputOption = new RecipientIdentityInputOption();
        $inputOption->setName('phone_number_list');
        $inputOption->setValueType('PhoneNumberList');
        $inputOption->setPhoneNumberList(array($phoneNumber));

        $identityVerification = new RecipientIdentityVerification();
        $identityVerification->setWorkflowId($this->docuSign->workflow_id);
        $identityVerification->setInputOptions(array($inputOption));
        $signer->setIdentityVerification($identityVerification);
    }


    // DigiSigner
    // protected $access;
    // public function __construct()
    // {
    //     $company = DCompany::find(getMarCompany()[0]);
    //     $this->access = $company->docu_sign_token ? $company->docu_sign_token : config('docusign.digi_token');
    // }

    // public function signDocument($dProject, $pDocument)
    // {
    //     try {

    //         $document = DProjectDocument::where('type_doc', $pDocument->type)
    //             ->where('d_project_id', $dProject->id)
    //             ->first();

    //         if ($document && $document->status == DProjectDocumentStatus::HAS_SOMETHING->value) {
    //             $fileContent = file_get_contents(storage_path('app/' . $document->path));
    //             $documentId = $this->getSignDocumentId($fileContent, $pDocument);

    //             $signatureResponse = $this->getSignatureResponse(
    //                 $pDocument,
    //                 $dProject,
    //                 $document,
    //                 $documentId
    //             );

    //             $signatureRequestId = $signatureResponse->json('signature_request_id');

    //             $document->update([
    //                 'envelope_id' => $signatureRequestId,
    //                 'document_signature_id' => $documentId,
    //                 'count_signature' => $document->count_signature + 1
    //             ]);


    //             return true;
    //         } else {
    //             throw new CustomException('Le document n\'est pas encore généré');
    //         }
    //     } catch (\Throwable $th) {
    //         throw new CustomException($th->getMessage());
    //     }
    // }

    // public function getSignDocumentId($fileContent, $pDocument)
    // {
    //     $response = Http::digiDocuSign($this->access)
    //         ->attach('file', $fileContent, $pDocument->entitled . '.pdf')
    //         ->post('/documents');

    //     return $response->json()['document_id'];
    // }

    // public function getSignatureResponse($pDocument, $dProject, $document, $documentId)
    // {

    //     $parser = new Parser();
    //     $pdf = $parser->parseFile(storage_path('app/' . $document->path));
    //     $numberOfPages = count($pdf->getPages());
    //     $tabs = $pDocument->tabs;
    //     $tabs[0]['sign_page'] = $numberOfPages;
    //     $pDocument->tabs = $tabs;
    //     return Http::digiDocuSign($this->access)
    //         ->withHeaders([
    //             'Content-Type' => 'application/json',
    //         ])
    //         ->post('/signature_requests', [
    //             'documents' => [
    //                 [
    //                     'document_id' => $documentId,
    //                     'subject' => 'Signature ' . $pDocument->entitled,
    //                     'message' => 'Signer votre ' . $pDocument->entitled,
    //                     'signers' => [
    //                         [
    //                             'email' => 'med.romdhane06@gmail.com',
    //                             'fields' => [
    //                                 [
    //                                     'page' => 0,
    //                                     'rectangle' => [
    //                                         $pDocument->tabs[0]['blc']['x'],
    //                                         $pDocument->tabs[0]['blc']['y'],
    //                                         $pDocument->tabs[0]['trc']['x'],
    //                                         $pDocument->tabs[0]['trc']['y']
    //                                     ],
    //                                     'type' => 'SIGNATURE',
    //                                 ],
    //                             ],
    //                         ],
    //                     ],
    //                 ],
    //             ],
    //         ]);
    // }

    // public function attachSignedDocument($document_id)
    // {

    //     $projectDocument = DProjectDocument::where(
    //         'document_signature_id',
    //         $document_id
    //     )->first();

    //     $pDocument = $projectDocument->pDocument;
    //     $dProject = $projectDocument->project;

    //     $document = Http::digiDocuSign($this->access)
    //         ->get("/documents/{$projectDocument->document_signature_id}");

    //     $data['file'] = $document;
    //     $data['name'] = $pDocument->entitled;
    //     $this->attachDocuments(
    //         $dProject,
    //         $data + ['type_doc' => $pDocument?->type],
    //         $projectDocument,
    //         $pDocument
    //     );
    // }
    // public function attachDocuments($model, $document, $documentParent, $pDocument = null)
    // {
    //     DB::beginTransaction();
    //     $modelClassName = class_basename($model);
    //     $documentClassName = "App\\Models\\{$modelClassName}Document";
    //     if (!class_exists($documentClassName)) {
    //         throw new CustomException();
    //     }

    //     $data = $this->createNewVersion(
    //         $document['file'],
    //         $documentParent,
    //         $model,
    //         $document['name'],
    //     );

    //     if (!$pDocument) {
    //         $status = DProjectDocumentStatus::SATISFIED->value;
    //     } else {

    //         if (
    //             $pDocument->signature && $documentParent->status ==
    //             DProjectDocumentStatus::HAS_SOMETHING->value
    //         ) {
    //             $status = DProjectDocumentStatus::SATISFIED->value;
    //             if ($pDocument->reference == "ContractMarData" && $model->installer->company) {
    //                 $message = __(
    //                     'notifications.project.contrat_mar_signe',
    //                 );
    //                 sendNotificationUser(
    //                     'Contrat MAR signé',
    //                     $message,
    //                     null,
    //                     null,
    //                     [$model->creator, $model->installer->company->admin]
    //                 );
    //             }
    //         } else {

    //             $status = $pDocument->signature ?
    //                 DProjectDocumentStatus::HAS_SOMETHING->value :
    //                 DProjectDocumentStatus::SATISFIED->value;
    //         }
    //     }

    //     $documentParent->update(
    //         $data +
    //             [
    //                 'status' => $status,
    //                 'type_doc' => $document['type_doc'] ?? null,
    //             ]
    //     );
    //     setLog(__(
    //         'logs.client.generate_document',
    //         [
    //             'admin' => auth()->user()->username,
    //             'reference' => $model->reference,
    //             'document' => $documentParent->entitled,
    //         ]
    //     ));
    //     DB::commit();

    //     return $documentParent;
    // }

    // public function createNewVersion(
    //     $document,
    //     $documentParent,
    //     $model,
    //     $name
    // ) {

    //     $count = $documentParent->version_count + 1;
    //     $fileName = $name . '-' . $count;
    //     [$name, $path] = $this->uploadDocument(
    //         $document,
    //         $model->getDirectoryPathAttribute(),
    //         $fileName
    //     );

    //     $documentParent->versions()->create([
    //         'name' => $fileName,
    //         'path' => $path,
    //         'document_id' => $documentParent->id,
    //     ]);

    //     return ['version_count' => $count, 'path' => $path];
    // }


    // public function uploadDocument($file, $path, $name)
    // {
    //     $fileContents = $file->getBody()->getContents();

    //     $fullPath = $path . '/' . $name . '.pdf';
    //     Storage::put($fullPath, $fileContents);

    //     return [
    //         $name,
    //         $fullPath,
    //     ];
    // }
}
