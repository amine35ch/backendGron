<?php

namespace Database\Seeders;

use App\Models\PDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearDProjectDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $existingTypes=PDocument::select('type')->pluck('type');
        DB::table('d_project_documents')->whereNotNull('type_doc')->whereNotIn('type_doc',$existingTypes)->delete();

    }
}
