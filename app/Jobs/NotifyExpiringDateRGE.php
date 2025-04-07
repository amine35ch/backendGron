<?php

namespace App\Jobs;

use App\Models\DThirdParty;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyExpiringDateRGE implements ShouldQueue
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
        $oneMonthFromNow = Carbon::now()->addMonth();
        $oneMonthFromNowMinusOneDay = $oneMonthFromNow->copy()->subDay();
        $expiringThirdPartyRecords = DThirdParty::where('date_expiration_rge', '>', now())
            ->where('date_expiration_rge', '<=', $oneMonthFromNowMinusOneDay)
            ->get();
        notifyUsers(
            'RGE bientôt expiré.',
            'La date d\'expiration de la RGE approche rapidement.',
            $expiringThirdPartyRecords,
            null,
            true
        );
    }
}
