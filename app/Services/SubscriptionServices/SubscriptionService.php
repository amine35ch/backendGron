<?php

namespace App\Services\SubscriptionServices;

use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DPaymentMethodEnum\DPaymentMethodType;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DSubscriberInvoiceHeaderEnum\DSubscriberInvoiceHeaderType;
use App\Enums\FeatureEnum\FeatureType;
use App\Exceptions\CustomException;
use App\Models\DArticle;
use App\Models\DBrand;
use App\Models\DClient;
use App\Models\DProject;
use App\Models\DProjectOperation;
use App\Models\DWork;
use App\Models\User;
use App\Services\DCompanyServices\DCompanyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SubscriptionService
{
    public function __construct()
    {
    }


    public function validateFeature($dCompany_code, $feature)
    {
        return true;
        $stockageState = Http::subscription()
            ->get("/subscribers/{$dCompany_code}/check-feature/{$feature}");
        if ($stockageState->json() == false) {
            $message = __("responses.feature_check.{$feature}");
            throw new CustomException($message);
        }
    }

    public function DSubscriptionInvoiceByUser($request)
    {
        return [];
        $user = auth()->user();
        $url = "/subscribers/{$user->company_code}/invoices";
        $startSymbol = '?';
        if (isset($request['search'])) {
            $url .= "?search={$request['search']}";
            $startSymbol = '&';
        }
        if ($request['paginated'] == true) {
            $pageSize = $request['page_size'] ?? null;
            $page = $request['page'] ?? 1;
            $url .= $startSymbol . "paginated=true&page={$page}&page_size={$pageSize}";
            $startSymbol = '&';
        }
        if (isset($request['state'])) {
            $url .= $startSymbol . "state={$request['state']}";
        }


        $invoices = Http::subscription()
            ->get($url);
        return $invoices->json();
    }


    public function sendCompanyInformation($planData)
    {
        return [];
        $dCompanyService = new DCompanyService();
        $dCompany = $dCompanyService->getById($planData['d_company_id']);
        $otherRules = [];
        if (!isset($planData['payment_method'])) {
            $otherRules = [
                'type' => DPaymentMethodType::DIRECT->value,
                'p_payment_method' => DPaymentMethodType::DIRECT->value,
            ];
        } else {
            $otherRules = [
                'payment_method' => $planData['payment_method']
            ];
        }
        $dCompanyData = $otherRules + [
            'trade_name' => $dCompany->trade_name,
            'siret' => $dCompany->siret,
            'city' => $dCompany->city,
            'zip_code' => $dCompany->zip_code,
            'address' => $dCompany->address,
            'email' => $dCompany->email,
            'password' => auth()->user()->password,
            'white_list' => '0',
            'p_plan_id' => $planData['p_plan_id'],
            'p_plan_payment_type_id' => $planData['p_plan_payment_type_id'],
            'start_date' => $planData['start_date'],
            'code' => $dCompany->code,
        ];
        $response = Http::subscription()
            ->post("/subscribers/others", $dCompanyData);
        // if ($response->failed()) {
        //     throw new CustomException();
        // }
        return $response->json();
    }



    public function getAllPlans($request)
    {
        return [];
        $plans = Http::subscription()
            ->get("/plans", $request->all());
        if ($plans->successful()) {
            return $plans->json();
        } else {
            throw new CustomException();
        }
    }
    public function getAllPlanPaymentTypes()
    {
        return [];
        $plansPaymentTypes = Http::subscription()
            ->get("/plan-payment-types");
        if ($plansPaymentTypes->successful()) {
            return $plansPaymentTypes->json();
        } else {
            throw new CustomException();
        }
    }
    public function getAllPPaymentMethods()
    {
        return [];
        $pPaymentMethods = Http::subscription()
            ->get("/p-payment-methods");
        if ($pPaymentMethods->successful()) {
            return $pPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }

    public function getPPaymentMethodById($payment_method_id)
    {
        return [];
        $pPaymentMethods = Http::subscription()
            ->get("/p-payment-methods/{$payment_method_id}");
        if ($pPaymentMethods->successful()) {
            return $pPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }

    public function getDPaymentMethodsBySubscriber()
    {
        return [];
        $company_code = auth()->user()->company_code;
        $dPaymentMethods = Http::subscription()
            ->get("subscribers/{$company_code}/payment-methods");
        if ($dPaymentMethods->successful()) {
            return $dPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }
    public function getDPaymentMethodById($payment_method_id)
    {
        return [];
        $dPaymentMethods = Http::subscription()
            ->get("/payment-methods/{$payment_method_id}");
        if ($dPaymentMethods->successful()) {
            return $dPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }

    public function storeDPaymentMethod($data)
    {
        return [];
        $data['code'] = auth()->user()->company_code;
        $dPaymentMethods = Http::subscription()
            ->post("/payment-methods", $data);
        return $dPaymentMethods->json();
    }

    public function updateDPaymentMethod($data)
    {
        return [];
        $data['code'] = auth()->user()->company_code;
        $dPaymentMethods = Http::subscription()
            ->post("/payment-methods/{$data['payment_method']}?_method=put", $data);
        if ($dPaymentMethods->successful()) {
            return $dPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }

    public function deleteDPaymentMethod($payment_method_id)
    {
        return [];
        $dPaymentMethods = Http::subscription()
            ->delete("/payment-methods/{$payment_method_id}");
        if ($dPaymentMethods->successful()) {
            return $dPaymentMethods->json();
        } else {
            throw new CustomException();
        }
    }

    public function sendProjects($projectsData)
    {
        return [];
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $lines = [];
            foreach ($projectsData['projects_ids'] as $key => $project_id) {
                $dProject = DProject::find($project_id);
                $lines[$key]['reference_project'] = $dProject->reference;
                if ($dProject->state !== DProjectState::COMPLETED->value) {
                    throw new CustomException('Ce projet doit être terminé pour être facturé.');
                }
                if ($user->profile == DCompanyProfile::MAR->value) {
                    $operation = $dProject->operations->where('p_operation_id', 1)->first();
                    if ($operation->is_billed == 1) {
                        throw new CustomException('Ce projet ' . $dProject->reference . ' est déjà facturé.');
                    }
                }
                if ($user->profile == DCompanyProfile::AUD->value) {
                    $operation = $dProject->operations->where('p_operation_id', 2)->first();
                    if ($operation->is_billed == 1) {
                        throw new CustomException('Ce projet ' . $dProject->reference . ' est déjà facturé.');
                    }
                }
                if ($user->profile == DCompanyProfile::INS->value) {
                    $operation = $dProject->operations->where('p_operation_id', 3)->first();
                    if ($operation->is_billed == 1) {
                        throw new CustomException('Ce projet ' . $dProject->reference . ' est déjà facturé.');
                    }
                }
                $operationsToUpdate[] = $operation;
            }
            $body = [
                'code' => $user->company_code,
                'locked' => 0,
                'type' => DSubscriberInvoiceHeaderType::PROJECT->value,
                'invoice_date' => now()->format('Y-m-d'),
                'lines' => $lines
            ];
            $response = Http::subscription()
                ->post("/subscriber-invoices/projects", $body);
            if ($response->successful()) {
                foreach ($operationsToUpdate as $operation) {
                    $operation->update([
                        'is_billed' => 1,
                        'reference_invoice' => $response['data']['reference']
                    ]);
                }
            } else {
                throw new CustomException();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new CustomException($th->getMessage());
        }
    }

    public function addFeature($request)
    {
        return [];
        $user = auth()->user();
        $body = [
            'code' => $user->company_code,
            'p_feature_id' => $request['p_feature_id'],
            'quantity' => $request['quantity'],
            'type' => DSubscriberInvoiceHeaderType::FEATURES->value
        ];
        $response = Http::subscription()
            ->post("/subscriber-features", $body);
        return $response->json();
    }

    public function removeFeature($request)
    {
        return [];
        $response = Http::subscription()
            ->delete("/subscriber-features/{$request['d_subscriber_feature']}");
        return $response->json();
    }

    public function updatePlan($request)
    {
        return [];
        $user = auth()->user();
        $response = Http::subscription()
            ->post("subscribers/{$user->company_code}/update-plan?_method=put", $request);

        return $response->json();
    }


    public function cancelPlan()
    {
        return [];
        $user = auth()->user();
        $response = Http::subscription()
            ->post("subscribers/{$user->company_code}/cancel-plan?_method=put");

        return $response->json();
    }

    public function getAllFeateurs()
    {
        return [];
        $response = Http::subscription()
            ->get("features");
        return $response->json();
    }



    public function updateDFeatures($request)
    {
        $user = auth()->user();
        $body = [
            'code' => $user->company_code,
            'd_subscription_id' => $request['d_subscription_id'],
            'p_feature_id' => $request['p_feature_id'],
            'quantity' => $request['quantity']
        ];
        $response = Http::subscription()
            ->post("/subscriber-features/{$request['subscriber_feature_id']}?_method=put", $body);
        return $response->json();
    }

    public function getSubscriberSubscription()
    {
        $user = auth()->user();

        $response = Http::subscription()
            ->get("/subscribers/{$user->company_code}/current-subscription");
        return $response->json();
    }


    public function getSubscriberFeature()
    {
        $user = auth()->user();

        $response = Http::subscription()
            ->get("/subscribers/{$user->company_code}/all-available-features");
        return $response->json();
    }

    public function validateInvoice($request)
    {

        $body = [
            'state' => 1
        ];
        $response = Http::subscription()
            ->post("/subscriber-invoices/{$request['sub_invoice_id']}/update-state?_method=put", $body);
        return $response->json();
    }

    public function cancelInvoice($request)
    {
        $user = auth()->user();
        $body = [
            'state' => 2
        ];
        $response = Http::subscription()
            ->post("/subscriber-invoices/{$request['sub_invoice_id']}/update-state?_method=put", $body);

        $operations = DProjectOperation::where('d_company_id', $user->company->id)->where('reference_invoice', $request['reference'])->get();
        foreach ($operations as $operation) {
            $operation->update([
                'is_billed' => 0,
                'reference_invoice' => null
            ]);
        }
        return $response->json();
    }

    private function percentagePerFeature($featureQuantity, $currentQuantity)
    {
        if ($featureQuantity == -1) {
            return 0;
        }
        return  round((($currentQuantity) / $featureQuantity) * 100, 2);
    }

    public function percentageCountFeature()
    {

        $response = $this->getSubscriberFeature();
        $data['active'] = 0;
        $extras = $this->getExtraSubscriberFeatures($data);
        $user = auth()->user();
        $data = [];
        foreach ($response as $feature) {
            switch ($feature['type']) {
                case  FeatureType::STORAGE->value:
                    $data['STORAGE']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $user->company->size_documents);
                    $data['STORAGE']['COUNT'] = $user->company->size_documents . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['STORAGE']['pending'] = $extra;
                    break;
                case  FeatureType::USER->value:
                    $userCount = $user->company->users->count();
                    $data['USER']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $userCount);
                    $data['USER']['COUNT'] = $userCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['USER']['pending'] = $extra;
                    break;
                case  FeatureType::PROJECT->value:
                    $projectsCount = $user->company->projects->count();
                    $data['PROJECT']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $projectsCount);
                    $data['PROJECT']['COUNT'] = $projectsCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['PROJECT']['pending'] = $extra;
                    break;
                case  FeatureType::CLIENT->value:
                    $dClientCount = DClient::where('d_company_id', $user->userable_id)->count();
                    $data['CLIENT']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $dClientCount);
                    $data['CLIENT']['COUNT'] = $dClientCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['CLIENT']['pending'] = $extra;
                    break;
                case  FeatureType::AGENT->value:
                    $agentCount = $user->company->where('profile', DCompanyProfile::MAN->value)->count();
                    $data['AGENT']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $agentCount);
                    $data['AGENT']['COUNT'] = $agentCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['AGENT']['pending'] = $extra;
                    break;
                case  FeatureType::BRAND->value:
                    $brandCount = DBrand::where('d_company_id', $user->userable_id)->where('default', 0)->count();
                    $data['BRAND']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $brandCount);
                    $data['BRAND']['COUNT'] = $brandCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['BRAND']['pending'] = $extra;
                    break;
                case  FeatureType::WORK->value:
                    $workCount = DWork::where('d_company_id', $user->userable_id)->where('default', 0)->count();
                    $data['WORK']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $workCount);
                    $data['WORK']['COUNT'] = $workCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['WORK']['pending'] = $extra;
                    break;
                case  FeatureType::PRODUCT->value:
                    $productCount = DArticle::where('type', DArticleType::PRODUCT->value)->where('d_company_id', $user->userable_id)->where('default', 0)->count();
                    $data['PRODUCT']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $productCount);
                    $data['PRODUCT']['COUNT'] = $productCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['PRODUCT']['pending'] = $extra;
                    break;
                case  FeatureType::SERVICE->value:
                    $serviceCount = DArticle::whereIn('type', [DArticleType::SERVICE_MAR->value, DArticleType::SERVICE->value])->where('d_company_id', $user->userable_id)->where('default', 0)->count();
                    $data['SERVICE']['PERCENTAGE'] = $this->percentagePerFeature($feature['quantity'], $serviceCount);
                    $data['SERVICE']['COUNT'] = $serviceCount . "/" . ($feature['quantity'] == -1 ? 'indéterminé' : $feature['quantity']);
                    $extras = collect($extras);
                    $extra = $extras->where('p_feature_id', $feature['id'])->sum('quantity');
                    $data['SERVICE']['pending'] = $extra;
                    break;
                default:
                    throw new CustomException();
            }
        }
        return $data;
    }

    public function createSubsription($dCompany, $password)
    {
        return [];
        $body = [
            'trade_name' => $dCompany->trade_name,
            'siret' => $dCompany->siret,
            'city' => $dCompany->city,
            'zip_code' =>  $dCompany->zip_code,
            'address' =>  $dCompany->address,
            'email' =>  $dCompany->email,
            'password' =>  $password,
            'p_plan_payment_type_id' => 1,
            'free_trial' => 14,
            'period_before_cancellation' => 4,
            'payment_limit' => 500,
            'code' => $dCompany->code,
            'payment_method' => 4
        ];
        $response = Http::subscription()
            ->post("/subscribers/others", $body);
        if (!$response->successful()) {
            throw new CustomException();
        }
    }

    public function getSubscriberInvoiceById($id)
    {
        return [];

        $response = Http::subscription()
            ->get("/subscriber-invoices/{$id}");
        return $response->json();
    }


    public function downloadSubInvoice($id)
    {
        return [];

        $response = Http::subscription()
            ->get("/subscriber-invoices/{$id}/download");
        return $response;
    }

    public function addProjectToSubInvoice($DSubscriberInvoiceHeaderId, DProject $dProject)
    {
        return [];

        $response = Http::subscription()
            ->post("/subscriber-invoices/{$DSubscriberInvoiceHeaderId}/{$dProject->id}/add-project?_method=put");
        return $response;
    }

    public function removeProjectFromInvoice($dSubscriberInvoiceHeaderId, $dSubscriberInvoiceLineId)
    {
        return [];

        $response = Http::subscription()
            ->post("/subscriber-invoices/{$dSubscriberInvoiceHeaderId}/{$dSubscriberInvoiceLineId}/remove-project?_method=put");
        return $response;
    }

    public function getExtraSubscriberFeatures($request)
    {
        return [];

        $user = auth()->user();
        $url = "/subscriber-features/{$user->company_code}";
        $startSymbol = '?';
        if ($request['page_size'] ?? false == true) {
            $pageSize = $request['page_size'] ?? null;
            $page = $request['page'] ?? 1;
            $url .= $startSymbol . "paginated=true&page={$page}&page_size={$pageSize}";
            $startSymbol = '&';
        }
        if ($request['search'] ?? null) {
            $url .= $startSymbol . "search={$request['search']}";
            $startSymbol = '&';
        }
        if (isset($request['active'])) {
            $url .= $startSymbol . "active={$request['active']}";
        }
        $response = Http::subscription()
            ->get($url);
        return $response->json();
    }

    public function checkCreateProject()
    {
        return true;

        $user = auth()->user();
        $response = Http::subscription()
            ->get("/subscribers/{$user->company_code}/check-project");
        return $response->json();
    }

    public function getFeatureUnits($pFeatureId)
    {
        return [];

        $response = Http::subscription()
            ->get("/features/units/{$pFeatureId}");
        return $response->json();
    }
}
