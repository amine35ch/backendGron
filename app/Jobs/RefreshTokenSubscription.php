<?php

namespace App\Jobs;

use App\Models\DSubscriber;
use App\Services\DSubscriberServices\DSubscriberService;
use App\Services\PPreferenceServices\PPreferenceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class RefreshTokenSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $preferenceService = new PPreferenceService();
        $preference = $preferenceService->getFirst();
        $newToken = Http::subscription()
            ->get("refresh-token");
        $preference->update(['token' => $newToken]);
    }
}
