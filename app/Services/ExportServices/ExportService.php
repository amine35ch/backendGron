<?php

namespace App\Services\ExportServices;

use App\Exports\ListExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    public function export($data, $columns, $fileName, $title)
    {
        return Excel::download(new ListExport($data, $columns, $title), $fileName.'.xlsx');
    }
}
