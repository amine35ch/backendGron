<?php

namespace Database\Seeders;

use App\Models\PDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemoveSpacesFromPDocument extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pDocuments=PDocument::all();
        foreach ($pDocuments as $pDocument) {
            if ($pDocument->entitled[0]  == ' ') {
                $pDocument->update([
                    'entitled' => substr($pDocument->entitled, 1),
                ]);
            }
        }
    }
}
