<?php

namespace Database\Seeders;

use App\Models\DModelReference;
use App\Models\Mar;
use App\Models\PModelReference;
use Illuminate\Database\Seeder;

class MarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Mar::withoutEvents(function () {

            $company = Mar::firstOrCreate([
                'code' => generateRandomUniqueCode('MAR'),
                'entitled' => 'MAR',
                'email' => 'mar@vaerdia.com',
                'phone_1' => '123243422',
            ]);

            PModelReference::all()->each(function ($referenceModel) {

                $newCloneReferenceByMar = new DModelReference($referenceModel->toArray());

                $newCloneReferenceByMar->save();
            });
        });
    }
}
