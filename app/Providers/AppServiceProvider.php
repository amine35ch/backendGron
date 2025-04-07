<?php

namespace App\Providers;

use App\Models\DArticle;
use App\Models\DBrand;
use App\Models\DClient;
use App\Models\DClientDocumentVersion;
use App\Models\DCompany;
use App\Models\DGovernment;
use App\Models\DModelReference;
use App\Models\DProduct;
use App\Models\DProject;
use App\Models\DProjectDocumentVersion;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectVisit;
use App\Models\DScenario;
use App\Models\DWork;
use App\Models\PArticle;
use App\Models\PArticleType;
use App\Models\PBrand;
use App\Models\PPreference;
use App\Models\PScenario;
use App\Models\PSmtp;
use App\Models\PWork;
use App\Models\User;
use App\Observers\DArticleObserver;
use App\Observers\DBrandObserver;
use App\Observers\DClientDocumentVersionObserver;
use App\Observers\DClientObserver;
use App\Observers\DCompanyObserver;
use App\Observers\DGovernmentObserver;
use App\Observers\DModelReferenceObserver;
use App\Observers\DProductObserver;
use App\Observers\DProjectDocumentVersionObserver;
use App\Observers\DProjectInvoiceHeaderObserver;
use App\Observers\DProjectObserver;
use App\Observers\DScenarioObserver;
use App\Observers\DWorkObserver;
use App\Observers\PArticleObserver;
use App\Observers\PArticleTypeObserver;
use App\Observers\PBrandObserver;
use App\Observers\PScenarioObserver;
use App\Observers\PSmtpObserver;
use App\Observers\PWorkObserver;
use App\Observers\UserObserver;
use App\Services\DProjectVisitServices\DProjectVisitService;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // too do in an other life
        // $this->app->bind(DProjectVisitService::class, function() {
        //     return new DProjectVisit();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('fr');

        DClient::observe(DClientObserver::class);
        DProduct::observe(DProductObserver::class);
        DCompany::observe(DCompanyObserver::class);
        DProject::observe(DProjectObserver::class);
        DModelReference::observe(DModelReferenceObserver::class);
        DProjectInvoiceHeader::observe(DProjectInvoiceHeaderObserver::class);
        PSmtp::observe(PSmtpObserver::class);
        PWork::observe(PWorkObserver::class);
        PScenario::observe(PScenarioObserver::class);
        PArticleType::observe(PArticleTypeObserver::class);
        PBrand::observe(PBrandObserver::class);
        PArticle::observe(PArticleObserver::class);
        DWork::observe(DWorkObserver::class);
        DBrand::observe(DBrandObserver::class);
        DScenario::observe(DScenarioObserver::class);
        DArticle::observe(DArticleObserver::class);
        User::observe(UserObserver::class);
        DGovernment::observe(DGovernmentObserver::class);
        DProjectDocumentVersion::observe(DProjectDocumentVersionObserver::class);
        DClientDocumentVersion::observe(DClientDocumentVersionObserver::class);
        Http::macro('digiDocuSign', function ($access) {
            return Http::withoutVerifying()->withBasicAuth($access, '')
                ->baseUrl(env('DIGI_BASE_URI'));
        });
        Http::macro('subscription', function () {
            $token = PPreference::first()->value('token');

            return Http::withoutVerifying()
                ->withHeaders([
                    'accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])
                ->baseUrl(env('DIGI_BASE_URI'));
        });
    }
}
