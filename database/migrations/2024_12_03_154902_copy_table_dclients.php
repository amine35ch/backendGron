<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sourceTable = 'd_clients';
        $destinationTable = 'd_clients_refused';
        $createTableSql = DB::selectOne("SHOW CREATE TABLE `$sourceTable`")->{'Create Table'};
        $createTableSql = str_replace("`$sourceTable`", "`$destinationTable`", $createTableSql);

        // Modify foreign key names to ensure uniqueness
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_d_company_id_foreign)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_d_company_id_foreign1` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_deleted_by_foreign)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_deleted_by_foreign1` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_mar_id_foreign)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_mar_id_foreign1` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_type_foreign)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_type_foreign1` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_d_companies_FK)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_d_companies_FK1` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_d_companies_FK_1)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_d_companies_FK_11` FOREIGN KEY",
            $createTableSql
        );
        $createTableSql = preg_replace(
            "/CONSTRAINT `(d_clients_users_FK)` FOREIGN KEY/",
            "CONSTRAINT `d_clients_users_FK1` FOREIGN KEY",
            $createTableSql
        );

        DB::statement($createTableSql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS d_clients_refused');
    }
};
