<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PPreferenceSeeder::class,
            DocuSignSeeder::class,
            PStateSeeder::class,
            PStatusSeeder::class,
            PSmtpSeeder::class,
            PInvoiceReferenceSeeder::class,
            PPhaseSeeder::class,
            DModelReferenceSeeder::class,
            PProfileSeeder::class,
            PResourceSeeder::class,
            RoleSeeder::class,
            PRoleSeeder::class,
            PermissionSeeder::class,
            PPermissionSeeder::class,
            PPermissionRoleSeeder::class,
            PNotificationSeeder::class,
            PNotificationRoleSeeder::class,
            PRaisonTypesSeeder::class,
            DGovernmentSeeder::class,
            PTypeDocumentSeeder::class,
            PTypeClientSeeder::class,
            PProcessSeeder::class,
            PUnitSeeder::class,
            PStepSeeder::class,
            PNatureDocSeeder::class,
            PStatusDocSeeder::class,
            PDocumentSeeder::class,
            POperationSeeder::class,
            PQualificationSeeder::class,
            PQualificationPOperationSeeder::class,
            PStepDocumentSeeder::class,
            PNatureResidenceSeeder::class,
            PWorkTypeSeeder::class,
            PTypeDemandeProjectSeeder::class,
            PProjectIncomeClassSeeder::class,
            PProjectEnergyClassSeeder::class,
            PProjectResidenceSeeder::class,
            PProjectNatureSeeder::class,
            PTypeVisitSeeder::class,
            PProjectTypeSeeder::class,
            PClassSkipCountSeeder::class,
            PBonusSeeder::class,
            PFormSeeder::class,
            PFormBlocSeeder::class,
            PFormLineSeeder::class,
            PShuttleCardBlocSeeder::class,
            PShuttleCardLineSeeder::class,
            PDocumentQuestionSeeder::class,
            PScenarioSeeder::class,
            PWorkSeeder::class,
            PBrandSeeder::class,
            PArticleTypeSeeder::class,
            PArticleSeeder::class,
            DCompanySeeder::class,
            UserSeeder::class,
            DBrandSeeder::class,
            DWorkSeeder::class,
            DScenarioSeeder::class,
            DScenarioWorkSeeder::class,
            DArticleSeeder::class,
            DProjectSeeder::class,
            PMarScaleSeeder::class,
            PTypeEventSeeder::class,
            POperationDocumentSeeder::class,
            PInvoiceLineTypeSeeder::class,
            PTypeInvoiceSeeder::class,
            DCompanyArticleSeeder::class,
            PCategorySeeder::class,
            PSubCategorySeeder::class,
            PBarSeeder::class,
            PScaleSeeder::class,
            PScaleListSeeder::class,
            PTVASeeder::class,
            //new 
            DProjectStateSeeder::class,
            PNotificationTypeSeeder::class,
            DGeneralNotificationSeeder::class
        ]);
    }
}
