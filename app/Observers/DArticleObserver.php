<?php

namespace App\Observers;

use App\Models\DArticle;

class DArticleObserver
{
    /**
     * Handle the DArticle "creating" event.
     */
    public function creating(DArticle $dArticle): void
    {
        $dArticle->always = 0;

        if ($dArticle->type == 2) {
            $dArticle->access = 0;
            $dArticle->always = 1;
        }
        // if ($dArticle->type == 0) {
        //     $dArticle->reference=getNextReference('ART');
        // }

    }

    /**
     * Handle the DArticle "created" event.
     */
    public function created(DArticle $DArticle): void
    {
        try {
            $typeArticle = ($DArticle->type == 0) ? 'produit' : 'prestation';
            $action = 'create';
            $logMessage = __(
                "logs.article.$action.description",
                [
                    'username' => auth()->user()->username,
                    'reference' => $DArticle->designation,
                ]
            );
            setLog($logMessage . $DArticle->designation);
            // $configUrl = str_replace(
            //     ':id',
            //     $DArticle->id,
            //     config("custom_routes.$typeArticle.$action")
            // );
            // $message = __(
            //     'notifications.article.create',
            //     [
            //         'username' => auth()->user()->company?->trade_name,
            //         'article' => ($DArticle->type == 0) ? 'produit' : 'prestation',
            //     ]
            // );
            // sendNotificationUser(
            //     'Ajouter un nouveau ' . $typeArticle,
            //     $message,
            //     $configUrl,
            // );
        } catch (\Exception $e) {
        }
    }

    /**
     * Handle the DArticle "updated" event.
     */
    public function updated(DArticle $dArticle): void
    {
    }

    /**
     * Handle the DArticle "deleted" event.
     */
    public function deleting(DArticle $DArticle): void
    {
    }

    /**
     * Handle the DArticle "restored" event.
     */
    public function restored(DArticle $DArticle): void
    {
    }

    /**
     * Handle the DArticle "force deleted" event.
     */
    public function forceDeleted(DArticle $DArticle): void
    {
    }
}