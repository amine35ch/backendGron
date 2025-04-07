<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequests\DPaymentMethodStoreRequest;
use App\Http\Requests\SubscriptionRequests\DPaymentMethodUpdateRequest;
use App\Http\Requests\SubscriptionRequests\FeatureSubscriptionRemove;
use App\Http\Requests\SubscriptionRequests\FeatureSubscriptionStore;
use App\Http\Requests\SubscriptionRequests\FeatureSubscriptionUpdate;
use App\Http\Requests\SubscriptionRequests\InvoiceStateUpdate;
use App\Http\Requests\SubscriptionRequests\PlanStoreRequest;
use App\Http\Requests\SubscriptionRequests\PlanUpdateRequest;
use App\Http\Requests\SubscriptionRequests\UnpaiedProjectRequest;
use App\Models\DCompany;
use App\Models\DProject;
use App\Models\User;
use App\Services\SubscriptionServices\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{

    public function __construct(private SubscriptionService $subscriptionService)
    {
    }


    public function getInvoicesBySubscriber(Request $request)
    {
        $this->authorize('view subscription invoice');
        $subscriberInvoiceHeader = $this->subscriptionService->DSubscriptionInvoiceByUser($request);
        return response()->json(['data' => $subscriberInvoiceHeader], 200);
    }

    public function storeCompanyAndPlan(PlanStoreRequest $request)
    {
        $response = $this->subscriptionService->sendCompanyInformation($request->validated());

        return response()->json($response);
    }

    public function getAllPlanPaymentTypes()
    {

        $plans = $this->subscriptionService->getAllPlanPaymentTypes();

        return response()->json(['data' => $plans], 200);
    }

    public function getAllPlans(Request $request)
    {

        $plans = $this->subscriptionService->getAllPlans($request);

        return response()->json(['data' => $plans], 200);
    }

    public function getAllPPaymentMethods()
    {

        $pPaymentMethods = $this->subscriptionService->getAllPPaymentMethods();

        return response()->json(['data' => $pPaymentMethods], 200);
    }

    public function getPPaymentMethodById($payment_method_id)
    {

        $pPaymentMethod = $this->subscriptionService->getPPaymentMethodById($payment_method_id);

        return response()->json(['data' => $pPaymentMethod], 200);
    }


    public function getDPaymentMethodsBySubscriber()
    {

        $pPaymentMethod = $this->subscriptionService->getDPaymentMethodsBySubscriber();

        return response()->json(['data' => $pPaymentMethod], 200);
    }
    public function getDPaymentMethodById($payment_method_id)
    {

        $pPaymentMethod = $this->subscriptionService->getDPaymentMethodById($payment_method_id);

        return response()->json(['data' => $pPaymentMethod], 200);
    }

    public function storeDPaymentMethod(Request $request)
    {

        $response = $this->subscriptionService->storeDPaymentMethod($request);
        return response()->json(['data' => $response], 200);
    }

    public function updateDPaymentMethod(Request $request)
    {

        $response = $this->subscriptionService->updateDPaymentMethod($request);
        return response()->json(['data' => $response], 200);
    }

    public function deleteDPaymentMethod($payment_method_id)
    {
        $pPaymentMethod = $this->subscriptionService->deleteDPaymentMethod($payment_method_id);

        return response()->json(['data' => $pPaymentMethod], 200);
    }

    public function sendUnpayedProjects(UnpaiedProjectRequest $request)
    {
        $this->authorize('store subscription invoice');
        $this->subscriptionService->sendProjects($request->validated());
        return response()->json([
            'message' => __('actions.success'),
        ]);
    }

    public function addFeature(FeatureSubscriptionStore $request)
    {
        $this->authorize('store subscription invoice');
        $response = $this->subscriptionService->addFeature($request->validated());
        return response()->json(['data' => $response], 200);
    }

    public function removeFeature(FeatureSubscriptionRemove $request)
    {
        $this->authorize('update subscription invoice');
        $response = $this->subscriptionService->removeFeature($request->validated());
        return response()->json(['data' => $response], 200);
    }

    public function updatePlan(PlanUpdateRequest $request)
    {
        $this->authorize('update subscription invoice');
        $response = $this->subscriptionService->updatePlan($request->validated());
        return response()->json(['data' => $response], 200);
    }


    public function cancelPlan()
    {
        $this->authorize('update subscription invoice');
        $response = $this->subscriptionService->cancelPlan();
        return response()->json(['data' => $response], 200);
    }

    public function getFinishedProject(User $user)
    {

        $projects = $user->company->projects->where('state', 2);
        return response()->json(['data' => $projects], 200);
    }

    public function getAllPFeatures()
    {

        $response = $this->subscriptionService->getAllFeateurs();
        return response()->json(['data' => $response], 200);
    }

    public function updateDFeatures(FeatureSubscriptionUpdate $request)
    {
        $this->authorize('update subscription invoice');
        $response = $this->subscriptionService->updateDFeatures($request);
        return response()->json(['data' => $response], 200);
    }

    public function getSubscriberSubscription()
    {

        $response = $this->subscriptionService->getSubscriberSubscription();
        return response()->json(['data' => $response], 200);
    }

    public function getSubscriberFeature()
    {

        $response = $this->subscriptionService->getSubscriberFeature();
        return response()->json(['data' => $response], 200);
    }

    public function validateInvoice(InvoiceStateUpdate $request)
    {

        $response = $this->subscriptionService->validateInvoice($request);
        return response()->json(['data' => $response], 200);
    }

    public function cancelInvoice(InvoiceStateUpdate $request)
    {
        $this->authorize('update subscription invoice');
        $response = $this->subscriptionService->cancelInvoice($request);
        return response()->json(['data' => $response], 200);
    }

    public function percentageCountFeature()
    {

        $response = $this->subscriptionService->percentageCountFeature();
        return response()->json(['data' => $response], 200);
    }

    public function getSubscriberInvoiceById($subscriberInvoiceId){

        $this->authorize('view subscription invoice');
        $response=$this->subscriptionService->getSubscriberInvoiceById($subscriberInvoiceId);
        return response()->json(['data' => $response], 200);
    }

    public function downloadSubInvoice($subscriberInvoiceId){
        $this->authorize('view subscription invoice');
        $response = $this->subscriptionService->downloadSubInvoice($subscriberInvoiceId);
        if ($response->successful()) {
            return response()->streamDownload(function () use ($response) {
                echo $response->body();
            }, 'invoice.pdf');
        }

        // Handle the error appropriately
        return response()->json(['error' => 'Failed to download the invoice']);
    }

    public function addProjectToSubInvoice($DSubscriberInvoiceHeaderId,DProject $dProject){

        $this->authorize('store subscription invoice');
        $response=$this->subscriptionService->addProjectToSubInvoice($DSubscriberInvoiceHeaderId,$dProject);
        return response()->json(['data' => $response->json()], $response->status());

    }

    public function removeProjectFromInvoice($dSubscriberInvoiceHeaderId,$dSubscriberInvoiceLineId){

        $this->authorize('store subscription invoice');
        $response=$this->subscriptionService->removeProjectFromInvoice($dSubscriberInvoiceHeaderId,$dSubscriberInvoiceLineId);
        return response()->json(['data' => $response->json()], $response->status());

    }

    public function getExtraSubscriberFeatures(Request $request){

        $response=$this->subscriptionService->getExtraSubscriberFeatures($request);
        return response()->json(['data' => $response], 200);
    }

    public function getFeatureUnits($pFeatureId){

        $response=$this->subscriptionService->getFeatureUnits($pFeatureId);
        return response()->json(['data' => $response], 200);

    }

}
