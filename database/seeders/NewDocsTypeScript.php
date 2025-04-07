<?php

namespace Database\Seeders;

use App\Enums\PDocumentEnum\PDocumentType;
use App\Enums\PNatureDocEnum\PNatureDocEnum;
use App\Enums\RoleEnum\RoleEnum;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Models\PPermission;
use App\Models\PPermissionRole;
use App\Models\PResource;
use App\Models\PRole;
use App\Models\PStatusDoc;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NewDocsTypeScript extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('p_nature_docs')->truncate();
        $data = [
            [
                'entitled' => 'Attached',
                'nature' => 0,
            ],
            [
                'entitled' => 'Generated',
                'nature' => 1,
            ],
            [
                'entitled' => 'Generated with form',
                'nature' => 2,
            ],
            [
                'entitled' => 'Generated with form and can be attached (Facultatif)',
                'nature' => 3,
            ],
            [
                'entitled' => 'Generated and can be attached (Facultatif)',
                'nature' => 4,
            ],
            [
                'entitled' => 'Downloaded',
                'nature' => 5,
            ],
        ];

        DB::table('p_nature_docs')->insert($data);


        DB::table('p_status_docs')->truncate();
        $data = [
            [
                'status' => 0,
                'entitled' => [
                    "Attacher document",
                    "Générer document",
                    "Remplir formulaire",
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'secondary.main',
            ],
            [
                'status' => 1,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Modifier formulaire',
                    "Modifier formulaire",
                    "Générer formulaire"
                ],
                'color' => 'warning.main',

            ],
            [
                'status' => 2,
                'entitled' => [
                    'Attacher document',
                    'Générer document',
                    'Remplir formulaire',
                    "Remplir formulaire",
                    "Générer formulaire"
                ],
                'color' => 'info.main',

            ],
            [
                'status' => 3,
                'entitled' => [
                    'Attacher document',
                    'Document non signé',
                    'Document non signé',
                ],
                'color' => 'error.main',

            ],
            [
                'status' => 4,
                'entitled' => [
                    'Document attaché',
                    'Document finalisé',
                    'Document finalisé',
                    'Document finalisé (peut être attacher en option)',
                    'Document finalisé (peut être attacher en option)',
                ],
                'color' => 'success.main',

            ],
        ];

        foreach ($data as $item) {
            PStatusDoc::create([
                'status' => $item['status'],
                'entitled' => $item['entitled'],
                'color' => $item['color'],
            ]);
        }

        $pDocumentsWithForm=PDocument::whereIn('type',[1,2])->get();
        foreach ($pDocumentsWithForm as $pDocument) {
            $pDocument->nature_doc=PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value;
            $pDocument->save();
        }
        $MandatMar=PDocument::where('type',39)->first();
        $MandatMar->nature_doc = PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value;
        $MandatMar->save();

        $grilleDocs=DProjectDocument::whereIn('type_doc',[PDocumentType::GRILLE_D_ANALYSE_DU_LOGEMENT->value,PDocumentType::SYNTHESE_GRILLE_D_ANALYSE_DU_LOGEMENT->value])->get();
        foreach ($grilleDocs as $grilleDoc) {
            $grilleDoc->update([
                'nature_doc'=>PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value
            ]);
        }

        $MandatMars=DProjectDocument::where('type_doc',39)->get();
        foreach ($MandatMars as $MandatMar) {
            $MandatMar->update([
                'nature_doc'=>PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value
            ]);
        }

        DB::table('d_company_project_docs')
        ->whereIn('type_doc', [
            PDocumentType::GRILLE_D_ANALYSE_DU_LOGEMENT->value,
            PDocumentType::SYNTHESE_GRILLE_D_ANALYSE_DU_LOGEMENT->value
        ])
        ->update(['nature_doc' => PNatureDocEnum::GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED->value]);

    // Update the nature_doc for the second set of documents
    DB::table('d_company_project_docs')
        ->where('type_doc', 39)
        ->update(['nature_doc' => PNatureDocEnum::GENERATED_AND_CAN_BE_ATTACHED->value]);
    }


}
