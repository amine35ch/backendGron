<?php

namespace App\Http\Middleware;

use App\Enums\FeatureEnum\FeatureType;
use App\Enums\SubscriptionEnum\DSubscriptionStateEnum;
use App\Exceptions\CustomException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class GlobalCheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        $user = auth()->user();
        $subscriptionState = Http::subscription()
            ->get("subscribers/{$user->company_code}/check-plan");
        if ($subscriptionState->json() == DSubscriptionStateEnum::NOT_EXIST->value) {
            throw new CustomException('Votre abonnement n\'exist pas.');
        } elseif ($subscriptionState->json() == DSubscriptionStateEnum::NOT_PAYED->value) {
            throw new CustomException('Votre abonnement est terminé.');
        } elseif ($subscriptionState->json() == DSubscriptionStateEnum::DEACTIVATED->value) {
            throw new CustomException('Votre abonnement est désactiver.');
        } elseif ($subscriptionState->json() == DSubscriptionStateEnum::CANCELED->value) {
            throw new CustomException('Votre abonnement est annulé.');
        }
        $stockageState = Http::subscription()
            ->get("/subscribers/{$user->company_code}/check-feature/" . FeatureType::STORAGE->value);
        if ($stockageState->json() == false) {
            throw new CustomException('Votre espace de stockage a dépassé la limite.');
        }
        return $next($request);
    }
}
