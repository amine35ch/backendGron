<?php

namespace Database\Seeders;

use App\Enums\DArticleEnum\DArticleState;
use App\Models\DArticle;
use App\Models\DArticlePrice;
use App\Models\DCompany;
use App\Models\PArticle;
use Illuminate\Database\Seeder;

class DCompanyArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $dCompany = DCompany::find(1);
        // $pArticles = PArticle::get();
        // foreach ($pArticles as $pArticle) {

        //     $dArticle = DArticle::create([
        //         'designation' => $pArticle->designation,
        //         'description' => $pArticle->description,
        //         'unit' => $pArticle->unit,
        //         'type' => $pArticle->type,
        //         'path' => $pArticle->path,
        //         'doc_name' => $pArticle->doc_name,
        //         'd_brand_id' => $pArticle->p_brand_id,
        //         'd_company_id' => $dCompany->id,
        //         'mar_id' => $dCompany->id,
        //         'access' => 1,
        //         'is_validated' => 1,
        //     ]);
        //     $dArticle->works()->attach($pArticle->p_work_id);
        //     DArticlePrice::create([
        //         'unit_price' => $pArticle->selling_price,
        //         'd_article_id' => $dArticle->id,
        //         'state' => DArticleState::ACTIVATED->value,
        //         'd_company_id' => $dCompany->id,
        //     ]);
        // }
    }
}
