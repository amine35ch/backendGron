<?php

namespace Database\Seeders;

use App\Models\PScaleList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PScaleListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_scale_lists')->truncate();
        $data = [
            [
                'entitled' => 'Soufflé',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Deroulé',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'plaque',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Autres Mode de Pose',
                'scale' => 'mode_pose',
            ],
            [
                'entitled' => 'Caisse standard',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => 'Caisson basse consommation',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => 'Caisson basse pression',
                'scale' => 'type_caisson',
            ],
            [
                'entitled' => "Type A : seules les bouches d'extraction sont hygroréglables",
                'scale' => 'type_vmc',
            ],
            [
                'entitled' => "Type B : les bouches d'extraction et les entrées d'air sont hygroréglables",
                'scale' => 'type_vmc',
            ],
            [
                'entitled' => "Chauffage seul",
                'scale' => 'usage_pac',
            ],
            [
                'entitled' => "Chauffage et eau chaude sanitaire",
                'scale' => 'usage_pac',
            ],
            [
                'entitled' => "air/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "eau/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "sol/eau",
                'scale' => 'type_pac',
            ],
            [
                'entitled' => "Basse température",
                'scale' => 't_pac',
            ],
            [
                'entitled' => "Moyenne température",
                'scale' => 't_pac',
            ],
            [
                'entitled' => "Haute température",
                'scale' => 't_pac',
            ],
            // [
            //     'entitled' => "Sur air extrait",
            //     'scale' => 'type_inst_ballon',
            // ],
            // [
            //     'entitled' => "Autres Type d'installation ballon",
            //     'scale' => 'type_inst_ballon',
            // ],
            // [
            //     'entitled' => "Oui",
            //     'scale' => 'appareil_label_flamme_verte_7',
            // ],
            // [
            //     'entitled' => "Non",
            //     'scale' => 'appareil_label_flamme_verte_7',
            // ],
            // [
            //     'entitled' => "Poêle",
            //     'scale' => 'type_appareil',
            // ],
            // [
            //     'entitled' => "Foyer fermé",
            //     'scale' => 'type_appareil',
            // ],
            // [
            //     'entitled' => "Insert",
            //     'scale' => 'type_appareil',
            // ],
            // [
            //     'entitled' => "Cuisinière",
            //     'scale' => 'type_appareil',
            // ],
            // [
            //     'entitled' => "Autres Type d'appareil",
            //     'scale' => 'type_appareil',
            // ],
            // [
            //     'entitled' => "Bûches de bois",
            //     'scale' => 'utilisant',
            // ],
            // [
            //     'entitled' => "Granulés de bois",
            //     'scale' => 'utilisant',
            // ],
        ];

        foreach ($data as $datum) {
            PScaleList::firstOrCreate($datum);
        }
    }
}
