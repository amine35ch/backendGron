<?php

namespace Database\Seeders;

use App\Models\PScenario;
use Illuminate\Database\Seeder;

class PScenarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PScenario::withoutEvents(function () {
            $count = 0;
            $originalArray = [
                'entitled' => 'Rampants+Comble Perdus+PAC+VMC',
                'description' => 'scenario.',
                'created_at' => now(),
                'updated_at' => now(),
                'state' => 1,
                'type' => 0,
            ];
            $list = [
                'Rampants+Comble Perdus+PAC+VMC',
                'Rampants+Comble Perdus+PAC+BT+VMC',
                'Rampants+Comble Perdus+BT+VMC',
                'Rampants+Comble Perdus+VMC',
                'Terrasse+Comble Perdus+PAC+BT+VMC',
                'Terrasse+Comble Perdus+PAC+VMC',
                'Terrasse+Comble Perdus+BT+VMC',
                'Terrasse+Comble Perdus+VMC',
                'Terrasse+Rampant+PAC+BT+VMC',
                'Terrasse+Rampant+PAC+VMC',
                'Terrasse+Rampant+BT+VMC',
                'Terrasse+Rampant+VMC',
                'Rampants+Plancher Bas+PAC+BT+VMC',
                'Rampants+Plancher Bas+PAC+VMC',
                'Rampants+Plancher Bas+BT+VMC',
                'Rampants+Plancher Bas+VMC',
                'Terrasse+Plancher Bas+PAC+BT+VMC',
                'Terrasse+Plancher Bas+PAC+VMC',
                'Terrasse+Plancher Bas+BT+VMC',
                'Terrasse+Plancher Bas+VMC',
                'Comble Perdus+Plancher Bas+PAC+BT+VMC',
                'Comble Perdus+Plancher Bas+PAC+VMC',
                'Comble Perdus+Plancher Bas+BT+VMC',
                'Comble Perdus+Plancher Bas+VMC',
                'Rampants+ITE+PAC+BT+VMC',
                'Rampants+ITE+PAC+VMC',
                'Rampants+ITE+BT+VMC',
                'Rampants+ITE+VMC',
                'Comble Perdus+ITE+PAC+BT+VMC',
                'Comble Perdus+ITE+PAC+VMC',
                'Comble Perdus+ITE+BT+VMC',
                'Comble Perdus+ITE+VMC',
                'Terrasse+ITE+PAC+BT+VMC',
                'Terrasse+ITE+PAC+VMC',
                'Terrasse+ITE+BT+VMC',
                'Terrasse+ITE+VMC',
                'Rampants+ITI+PAC+BT+VMC',
                'Rampants+ITI+PAC+VMC',
                'Rampants+ITI+BT+VMC',
                'Rampants+ITI+VMC',
                'Comble Perdus+ITI+PAC+BT+VMC',
                'Comble Perdus+ITI+PAC+VMC',
                'Comble Perdus+ITI+BT+VMC',
                'Comble Perdus+ITI+VMC',
                'Terrasse+ITI+PAC+BT+VMC',
                'Terrasse+ITI+PAC+VMC',
                'Terrasse+ITI+BT+VMC',
                'Terrasse+ITI+VMC',
                'ITE+Plancher Bas+PAC+BT+VMC',
                'ITE+Plancher Bas+PAC+VMC',
                'ITE+Plancher Bas+BT+VMC',
                'ITE+Plancher Bas+VMC',
                'ITI+Plancher Bas+PAC+BT+VMC',
                'ITI+Plancher Bas+PAC+VMC',
                'ITI+Plancher Bas+BT+VMC',
                'ITI+Plancher Bas+VMC',
                'ITI+ITE+PAC+BT+VMC',
                'ITI+ITE+PAC+VMC',
                'ITI+ITE+BT+VMC',
                'ITI+ITE+VMC',
            ];

            $resultArray = [];
            foreach ($list as $item) {
                $newArray = $originalArray;
                $newArray['entitled'] = $item;
                $newArray['type'] = $count;
                $resultArray[] = $newArray;
                $count++;
            }
            PScenario::insert($resultArray);
        });
    }
}
