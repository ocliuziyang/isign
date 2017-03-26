<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;

class ExcelService {


    public function exportToExcel($fileName, $sheetName, $list)
    {
        Excel::create($fileName, function($excel) use ($sheetName, $list){

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

            $excel->sheet($sheetName, function ($sheet) use ($list) {
                $sheet->fromArray($list);
            });

        })->export('xls');
    }

}