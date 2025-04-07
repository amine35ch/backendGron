<?php

namespace Database\Seeders;

use App\Enums\PDocumentEnum\PDocumentType;
use App\Models\DProjectDocument;
use App\Models\DResponseForm;
use App\Models\PStepDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBaseParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PNotificationSeeder::class,
            DGeneralNotificationSeeder::class,
            PDocumentSeeder::class,
            PStepDocumentSeeder::class,
            // ClearDProjectDocumentSeeder::class,
            DCompanyProjectDocsSeeder::class,
            PBarSeeder::class,
            PScaleSeeder::class,
            PScaleListSeeder::class,
            PFormLineSeeder::class,
        ]);
        DB::table('d_project_documents')->where('type_doc',PDocumentType::DERNIERE_DECLARATION_FISCALE->value)->where('required',1)->update([
            'required'=>0
        ]);

        //fix dresponseform
        $formResponses=DResponseForm::where('reference_line','1_1_106')->select('id','response')->get();
        foreach ($formResponses as $formResponse) {
            $preciseValue=$formResponse->response['data']['fields'][0]['ajout'][0]['fields'][0]['value']?? '';
            $yesValue=$formResponse->response['data']['fields'][0]['value'] ?? 0;
            $noValue=$formResponse->response['data']['fields'][1]['value'] ?? 0;
            $newResponse=[
                "data" => [
                  "fields" => [
                  
                    [
                      "id" => 1,
                      "title" => "Oui",
                      "value" => $yesValue,
                      "format" => "radiobox",
                      "status" => null,
                      "blocage" => 0,
                      "remarque" => null,
                    ],
                    [
                        "id" => 2,
                        "ajout" => [
                          0 => [
                            "id" => 1,
                            "type" => 3,
                            "fields" => [
                              0 => [
                                "id" => 1,
                                "title" => null,
                                "value" => $preciseValue,
                                "format" => "text",
                                "status" => null,
                                "blocage" => 0,
                                "remarque" => null,
                              ],
                          ],
                            "question" => "Préciser  :",
                            "display_type" => 1,
                      ],
                  ],
                        "title" => "Non",
                        "value" => $noValue,
                        "format" => "radiobox",
                        "status" => null,
                        "blocage" => 0,
                        "remarque" => null,
              ],
                ],
                  "question" => null,
                  "operation" => [
                    "fields" => null,
                    "expression" => null,
                  ]
                ]
                  ];
                  $formResponse->update([
                    'response'=>$newResponse
                  ]);
        }
    }
}
