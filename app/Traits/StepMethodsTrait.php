<?php

namespace App\Traits;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Exceptions\CustomException;

trait StepMethodsTrait
{
    public function signDocuments()
    {
        try {
            $docuSignService = new \App\Services\DocuSignServices\DocuSignService();
            $documents = $this->dProject->documents
                ->where('order_step', $this->dProject->current_step_order)
                ->where('count_signature', 0)
                ->where('status', DProjectDocumentStatus::HAS_SOMETHING->value)
                ->where(function ($row) {
                    return $row->pDocument->signature == 1;
                });
            if (! $documents->isEmpty()) {

                $docuSignService->addDocumentToSignList($documents);
                $docuSignService->addSigner(
                    $this->dProject->client?->first_name .
                        $this->dProject->client?->last_name,
                    $this->dProject->client?->email_contact,
                    $this->dProject->client?->id
                );
                $subject = '';
                foreach ($documents as $document) {
                    $tabs = $document->pDocument->tabs;
                    if ($document->type_doc == 16 && $this->dProject->invoices->where('type', 1)->first()->lines->count() > 5) {
                        $tabs[0]['sign_page'] += 1;
                    }
                    $docuSignService->addSignHereTabsToDocument(
                        $document,
                        $tabs,
                        $docuSignService->signers[0]
                    );
                    $subject .= $document->name . ' & ';
                }
                $docuSignService->setTabs($docuSignService->signers[0]);
                $docuSignService->setIdentityVerification(
                    $docuSignService->signers[0],
                    $this->dProject->client?->phone_number_1
                );
                $docuSignService->setEnvelopeDefinition($subject);
                $idEnvelope = $docuSignService->createEnvelope();
                foreach ($documents as $document) {
                    $document->update([
                        'envelope_id' => $idEnvelope,
                        'count_signature' => $document->count_signature + 1,
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return true;
        }
    }
}
