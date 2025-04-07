<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ListExport implements FromCollection, WithHeadings, WithStyles
{
    protected $lines;

    protected $columns;

    protected $name;

    public function __construct($lines, $columns, $name)
    {
        $this->lines = $lines;
        $this->name = $name;
        $this->columns = $columns;
    }

    public function collection()
    {
        return $this->lines;
    }

    public function title(): string
    {
        return $this->name;
    }

    public function headings(): array
    {
        return $this->columns;
    }

    public function styles(Worksheet $sheet)
    {
        // Define the style for the headers
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
                'name' => 'Arial',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'BLUE',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'A3A3A3'],
                ],
            ],
        ];

        // Define the style for the data rows
        $dataStyle = [
            'font' => [
                'bold' => false,
                'color' => ['rgb' => '000000'],
                'size' => 11,
                'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'A3A3A3'],
                ],
                'inside' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'A3A3A3'],
                ],
            ],
        ];

        $lastRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();
        $headerRange = 'A1:'.$lastColumn.'1';
        $dataRange = 'A2:'.$lastColumn.$lastRow;

        $sheet->getStyle($headerRange)->applyFromArray($headerStyle);

        $sheet->getStyle($dataRange)->applyFromArray($dataStyle);

        $sheet->getRowDimension(1)->setRowHeight(30);

        for ($column = 'A'; $column <= $lastColumn;
            $column++
        ) {
            $sheet->getColumnDimension($column)->setWidth(40);
        }

        for (
            $row = 2;
            $row <= $lastRow;
            $row++
        ) {
            $sheet->getRowDimension($row)->setRowHeight(25);
        }
    }
}
