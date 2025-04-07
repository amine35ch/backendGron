<?php

namespace Database\Seeders;

use App\Enums\PPhaseEnum\PPhaseRef;
use App\Factories\StepsFactory\StepsFactory;
use App\Models\DProject;
use Illuminate\Database\Seeder;

class DProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DProject::withoutEvents(function () {

        //     $data = [
        //         [
        //             'reference' => getNextReferenceProject(1),
        //             'd_client_id' => 1,
        //             'd_company_id' => 1,
        //             'current_step_order' => 1,
        //             'state' => 0,
        //             'process' => 0,
        //             'phase' => PPhaseRef::NEW->value
        //         ],]
        //         ;
        // //         [
        // //             'reference' => getNextReferenceProject(1),
        // //             'd_client_id' => 1,
        // //             'd_company_id' => 1,
        // //             'current_step_order' => 1,
        // //             'state' => 1,
        // //             'process' => 0,
        // //             'phase' => PPhaseRef::NEW->value
        // //         ],
        // //         [
        // //             'reference' => getNextReferenceProject(1),
        // //             'd_client_id' => 1,
        // //             'd_company_id' => 1,
        // //             'current_step_order' => 1,
        // //             'state' => 2,
        // //             'status' => 1,
        // //             'process' => 0,
        // //             'phase' => PPhaseRef::SIMULATION->value
        // //         ],
        // //         [
        // //             'reference' => getNextReferenceProject(1),
        // //             'd_client_id' => 1,
        // //             'd_company_id' => 1,
        // //             'current_step_order' => 1,
        // //             'state' => 0,
        // //             'process' => 0,
        // //             'phase' => PPhaseRef::NEW->value
        // //         ],
        // //         [
        // //             'reference' => getNextReferenceProject(1),
        // //             'd_client_id' => 1,
        // //             'd_company_id' => 1,
        // //             'current_step_order' => 1,
        // //             'state' => 2,
        // //             'process' => 0,
        // //             'phase' => PPhaseRef::AUDIT->value
        // //         ],

        // //     ] ;

        //     foreach($data as $item)
        //     {
        //         $dProject = DProject::create($item);
        //         $stepFactory = new StepsFactory($dProject);
        //         $stepFactory->init();
        //     }
        // });
    }
}
