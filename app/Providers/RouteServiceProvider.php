<?php

namespace App\Providers;

use App\Models\DArticle;
use App\Models\DArticlePrice;
use App\Models\DBrand;
use App\Models\DClient;
use App\Models\DClientDocument;
use App\Models\DClientDocumentVersion;
use App\Models\DCompany;
use App\Models\DCompanyDocument;
use App\Models\DCompanyDocumentVersion;
use App\Models\DDocument;
use App\Models\DGeneralNotification;
use App\Models\DGovernment;
use App\Models\DInvoiceCancelComment;
use App\Models\DLineResponse;
use App\Models\DLog;
use App\Models\DModelReference;
use App\Models\DNotification;
use App\Models\DProject;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\DProjectEvent;
use App\Models\DProjectHistory;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectOperation;
use App\Models\DProjectVisit;
use App\Models\DProjectWork;
use App\Models\DScenario;
use App\Models\DSubContractor;
use App\Models\DWork;
use App\Models\PArticleType;
use App\Models\PDocument;
use App\Models\POperation;
use App\Models\PProfile;
use App\Models\PSmtp;
use App\Models\PTypeDocument;
use App\Models\Root;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(auth()->user()?->id ?: $request->ip());
        });

        // RateLimiter::for('DocuSign', function (Request $request) {
        //     $userId = auth()->user()->id;
        //     $refDocument = $request->route('ref_document');
        //     $key = "{$userId}_{$refDocument}";

        //     return Limit::perMinutes(30, 1)->by($key)->response(function (Request $request, array $headers) {
        //         return response()->json(['errors' => ['message' => 'Trop de requêtes effectuées...', 'retry_after' => $headers['Retry-After']]], 429);
        //     });
        // });

        Route::bind('root', function ($value) {
            try {
                return Root::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Patron non trouvé');
            }
        });

        Route::bind('company', function ($value) {
            try {
                $segment = request()->segment(3);
                $reference = PProfile::where('identifier', $segment)->first()?->reference;

                return DCompany::where('profile', $reference)->findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Entreprise non trouvé');
            }
        });
        Route::bind('user', function ($value) {
            try {
                return User::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Utilisateur non trouvé');
            }
        });

        Route::bind('subscriber', function ($value) {
            try {
                return User::where('company_code', $value)->first();
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Utilisateur non trouvé');
            }
        });
        Route::bind('company_two', function ($value) {
            try {
                return DCompany::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Entreprise non trouvé');
            }
        });
        Route::bind('client', function ($value) {
            try {
                return DClient::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Client non trouvé');
            }
        });

        Route::bind('government', function ($value) {
            try {
                return DGovernment::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Gouverment non trouvé');
            }
        });
        Route::bind('document_type', function ($value) {
            try {
                return PTypeDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Type de document non trouvé');
            }
        });
        Route::bind('p_document', function ($value) {
            try {
                return PDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });
        Route::bind('comment', function ($value) {
            try {
                return DInvoiceCancelComment::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Commentaire non trouvé');
            }
        });
        Route::bind('ref_document', function ($value) {
            try {
                $document = PDocument::where(function ($query) use ($value) {
                    if (is_numeric($value)) {
                        return $query->where('type', $value);
                    }

                    return $query->where('reference', $value);
                })->first();

                if (!$document) {
                    abort(404, 'Document non trouvé');
                }

                return $document;
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });
        Route::bind('document', function ($value) {
            try {
                return DDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });

        Route::bind('invoiceA', function ($value) {
            try {
                return DProjectInvoiceHeader::firstOrNew(['id' => $value]);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Devis non trouvé');
            }
        });
        Route::bind('project', function ($value) {
            try {
                return DProject::findOrFail($value); // byUser()->
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Projet non trouvé');
            }
        });

        Route::bind('project_document', function ($value) {
            try {
                return DProjectDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });
        Route::bind('project_work', function ($value) {
            try {
                return DProjectWork::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Travaux non trouvé');
            }
        });
        Route::bind('general_notification', function ($value) {
            try {
                return DGeneralNotification::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Notification non trouvé');
            }
        });
        Route::bind('client_document', function ($value) {
            try {
                return DClientDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });

        Route::bind('company_document', function ($value) {
            try {
                return DCompanyDocument::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Document non trouvé');
            }
        });

        Route::bind('project_document_version', function ($value) {
            try {
                return DProjectDocumentVersion::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Version non trouvé');
            }
        });
        Route::bind('client_document_version', function ($value) {
            try {
                return DClientDocumentVersion::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Version non trouvé');
            }
        });

        Route::bind('company_document_version', function ($value) {
            try {
                return DCompanyDocumentVersion::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Version non trouvé');
            }
        });

        Route::bind('smtp', function ($value) {
            try {
                return PSmtp::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Smtp non trouvé');
            }
        });
        Route::bind('reference', function ($value) {
            try {
                return DModelReference::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Réference non trouvé');
            }
        });
        Route::bind('invoice', function ($value) {
            try {
                return DProjectInvoiceHeader::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Facture non trouvé');
            }
        });
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        Route::bind('operation', function ($value) {
            try {
                return POperation::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Opération non trouvé');
            }
        });

        Route::bind('project_operation', function ($value) {
            try {
                return DProjectOperation::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Opération non trouvé');
            }
        });
        Route::bind('project_history', function ($value) {
            try {
                return DProjectHistory::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'historique non trouvé');
            }
        });
        Route::bind('scenario', function ($value) {
            try {
                return DScenario::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Scenario non trouvé');
            }
        });
        Route::bind('notification', function ($value) {
            try {
                return DNotification::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Notification non trouvé');
            }
        });

        Route::bind('log', function ($value) {
            try {
                return DLog::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Historique non trouvé');
            }
        });

        Route::bind('project_visit', function ($value) {
            try {
                return DProjectVisit::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Visite non trouvé');
            }
        });
        Route::bind('project_event', function ($value) {
            try {
                return DProjectEvent::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Visite non trouvé');
            }
        });
        Route::bind('work', function ($value) {
            try {
                return DWork::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Opération non trouvé');
            }
        });
        Route::bind('article_type', function ($value) {
            try {
                return PArticleType::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Type non trouvé');
            }
        });

        Route::bind('brand', function ($value) {
            try {
                return DBrand::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Marque non trouvé');
            }
        });
        Route::bind('article', function ($value) {
            try {
                return DArticle::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Article non trouvé');
            }
        });
        Route::bind('article_price', function ($value) {
            try {
                return DArticlePrice::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Article non trouvé');
            }
        });
        Route::bind('sub_contractor', function ($value) {
            try {
                return DSubContractor::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Sous-traitance non trouvé');
            }
        });
        Route::bind('response', function ($value) {
            try {
                return DLineResponse::findOrFail($value);
            } catch (ModelNotFoundException $exception) {
                abort(404, 'Réponse non trouvé');
            }
        });
    }
}