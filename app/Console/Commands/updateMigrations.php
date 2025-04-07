<?php

namespace App\Console\Commands;

use App\Models\DCompany;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class updateMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_09_145730_change_column_d_companies_table.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_10_091453_change_column_d_project_works.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_13_102244_change_column_users_table.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_13_142019_add_column_tod_invoice_cancel_comments_table.php',
        ]);
        Artisan::call('migrate', [
            '--path' => '/database/migrations/2024_09_19_101126_add_column_to_d_clients_table.php',
        ]);

        $dCompanies=DCompany::select('id','parent_company_id')->get();
        foreach ($dCompanies as $dCompany) {
            DB::table('d_clients')->where('d_company_id',$dCompany->id)->update([
                'mar_id'=>$dCompany->parent_company_id
            ]);
        }
        DB::table('d_brands')->where('access',0)->update([
            'access'=>1,
        ]);
    }
}
