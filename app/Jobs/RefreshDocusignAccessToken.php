<?php

namespace App\Jobs;

use App\Models\DocuSign;
use App\Services\DocuSignServices\DocuSignService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RefreshDocusignAccessToken implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $docuSignService;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->docuSignService = new DocuSignService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $docuSign = DocuSign::first();

            if ($docuSign->expires_at <= now()->addMinutes(15)) {
                $this->docuSignService->refreshAccessToken();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
