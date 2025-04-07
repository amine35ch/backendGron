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
        $sourceTable = 'd_projects';
        $destinationTable = 'd_projects_refused';
        $createTableSql = DB::selectOne("SHOW CREATE TABLE `$sourceTable`")->{'Create Table'};
        $createTableSql = str_replace("`$sourceTable`", "`$destinationTable`", $createTableSql);
        DB::statement($createTableSql);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS d_projects_refused');
    }
};
