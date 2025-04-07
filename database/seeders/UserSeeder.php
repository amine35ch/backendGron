<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\DCompanyServices\DCompanyService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $roleGron = 'root';
        // $root = new User([
        //     'username' => $roleGron,
        //     'email' => 'gron@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'first_name' => 'root',
        //     'last_name' => 'root',
        //     'profile' => 'SUB',
        // ]);
        // $root->save();
        // $role = Role::where('name', 'SUB::admin')->first();
        // $root->assignRole($role);
        $dCompanyService = new DCompanyService();

        $dCompanyService->createMAR([
            'trade_name' => 'Aziz MAR',
            'phone_number_1' => '+33 07 68 25 66 64',
            'siren' => '913 846 722',
            'address' => '9 RUE DES COLONNES',
            'city' => 'PARIS',
            'zip_code' => '75002',
            'company_rcs' => 'Paris B 953 846 722',
            'email' => 'azizbenamor1288@gmail.com',
            'siret' => '943 846 722 00015',
            'profile' => 'MAR',
            'representative_first_name' => 'ARAS',
            'representative_last_name' => 'BAHRYE',
            'identifiant_tva' => 'FR20953846722',
        ]);
    }
}
