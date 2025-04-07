<?php

namespace Database\Seeders;

use App\Models\PScenarioOperation;
use Illuminate\Database\Seeder;

class PScenarioOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PScenarioOperation::create([
            'p_scenario_id' => 1,
            'p_operation_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        PScenarioOperation::create([
            'p_scenario_id' => 1,
            'p_operation_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        PScenarioOperation::create([
            'p_scenario_id' => 1,
            'p_operation_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
