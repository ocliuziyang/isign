<?php

namespace App\Services;

use App\User;
use League\Flysystem\Exception;
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

    public function importListFromExcel($filePath)
    {

        try {

            Excel::load($filePath, function ($reader){
                $reader = $reader->get(['name', 'bio', 'phone_number', 'sex', 'company', 'job']);
                foreach ($reader->toArray() as $row) {
                    User::firstOrCreate($row);
                }
            });

            return true;

        } catch (Exception $exception) {

            return false;
        }

    }
}