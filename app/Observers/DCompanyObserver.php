<?php

namespace App\Observers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\PStateEnum\PStateEnum;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DCompanyChild;
use App\Models\PDocument;

class DCompanyObserver
{
    /**
     * Handle the DCompany "creating" event.
     */
    public function creating(DCompany $dCompany): void
    {
        $dCompany->reference = getNextReference($dCompany->profile);
        if (!$dCompany->code) {
            $dCompany->code = generateRandomUniqueCode($dCompany->name);
        }
        if ($dCompany->profile !== DCompanyProfile::MAR->value) {
            $dCompany->parent_company_id = getCompanyOfConnectedUser($dCompany->linkToken)->id;
        }
        $dCompany->linkToken = null;
        $dCompany->state = PStateEnum::ACTIVATED->value;
    }

    /**
     * Handle the DCompany "created" event.
     */
    public function created(DCompany $dCompany): void
    {

        if ($dCompany->parent_company_id) {

            DCompanyChild::create([
                'd_company_id' => $dCompany->parent_company_id,
                'd_company_child_id' => $dCompany->id,
            ]);

            $parentChildIds = DCompanyChild::where(
                'd_company_child_id',
                $dCompany->parent_company_id
            )
                ->pluck('d_company_id');

            foreach ($parentChildIds as $parentId) {
                DCompanyChild::create([
                    'd_company_id' => $parentId,
                    'd_company_child_id' => $dCompany->id,
                ]);
            }
        }
        $docs = PDocument::where('is_project', 1)
            ->where('hidden', 0)->get();
        $docsArray = [];
        foreach ($docs as $doc) {
            $nature = $doc->nature_doc;
            if ($doc->type == PDocumentType::RELEVE_AUDIT->value) {
                if ($dCompany->fiche_navette_interne == 0) {
                    $nature = PNatureDocEnum::ATTACHED->value;
                }
            }
            if ($doc->type == PDocumentType::DEVIS_ENTREPRISE_RETENUE->value) {
                if ($dCompany->quotation_interne == 0) {

                    $nature = PNatureDocEnum::ATTACHED->value;
                }
            }
            $docsArray[] = [
                'type_doc' => $doc->type,
                'required' => $doc->required,
                'nature_doc' => $nature,
                'signature' => $doc->docu_signature
            ];
        }
        $dCompany->projectDocs()->attach($docsArray);
        $user = auth()->user();
        try {
            //code...
            setLog(__(
                'logs.third_party.create',
                [
                    'admin' => $user->username,
                    'reference' => $dCompany->reference
                ]
            ));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Handle the DCompany "updated" event.
     */
    public function updated(DCompany $dCompany): void
    {
        $user = auth()->user();
        if ($dCompany->isDirty('fiche_navette_interne')) {
            $pDoc = PDocument::where('type', PDocumentType::RELEVE_AUDIT->value)->first();
            $nature = $dCompany->fiche_navette_interne == 0 ? PNatureDocEnum::ATTACHED->value : $pDoc->nature_doc;
            $projectDoc = $dCompany->projectDocs->where('type', PDocumentType::RELEVE_AUDIT->value)->first();
            $projectDoc?->pivot?->update([
                'nature_doc' => $nature
            ]);
            // $dCompany->projectDocs()->updateExistingPivot(
            //     PDocumentType::RELEVE_AUDIT->value,
            //     [
            //         'nature_doc' => $nature
            //     ]
            // );
        }
        if ($dCompany->isDirty('quotation_interne')) {
            $pDoc = PDocument::where('type', PDocumentType::DEVIS_ENTREPRISE_RETENUE->value)->first();
            $nature = $dCompany->quotation_interne == 0 ? PNatureDocEnum::ATTACHED->value : $pDoc->nature_doc;
            $projectDoc = $dCompany->projectDocs->where('type', PDocumentType::DEVIS_ENTREPRISE_RETENUE->value)->first();
            $projectDoc?->pivot?->update([
                'nature_doc' => $nature
            ]);
            // $dCompany->projectDocs()->updateExistingPivot(
            //     PDocumentType::DEVIS_ENTREPRISE_RETENUE->value,
            //     [
            //         'nature_doc' => $nature
            //     ]
            // );
        }

        setLog(__(
            'logs.third_party.update',
            [
                'admin' => $user?->username,
                'reference' => $dCompany?->reference
            ]
        ));
    }

    /**
     * Handle the DCompany "deleted" event.
     */
    public function deleting(DCompany $dCompany): void
    {
        if ($dCompany->profile == DCompanyProfile::MAR->value) {
            throw new CustomException('Vous ne pouvez pas supprimer cette société');
        }
        if (!$dCompany->projectOperations->isEmpty()) {
            throw new CustomException('Vous ne pouvez pas supprimer cette société car il contient des projets');
        }
        $dCompany->articles->each(function ($article) use ($dCompany) {
            $article->update(['d_company_id' => $dCompany->parent_company_id]);
        });

        $dCompany->brands->each(function ($brand) use ($dCompany) {
            $brand->update(['d_company_id' => $dCompany->parent_company_id]);
        });
        $dCompany->users()->delete();
        $user = auth()->user();
        setLog(__(
            'logs.third_party.delete',
            [
                'admin' => $user->username,
                'reference' => $dCompany->reference
            ]
        ));
    }

    /**
     * Handle the DCompany "restored" event.
     */
    public function restored(DCompany $dCompany): void
    {
        $profile = $dCompany->profile;
        $dCompany->users()->whereHas('roles', function ($query) use ($profile) {
            return $query->where('name', $profile . '::admin');
        })->withTrashed()->restore();
    }

    /**
     * Handle the DCompany "force deleted" event.
     */
    public function forceDeleted(DCompany $dCompany): void
    {
        //
    }
}
