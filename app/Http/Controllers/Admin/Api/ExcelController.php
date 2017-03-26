<?php

namespace App\Http\Controllers\Admin\Api;

use App\Services\ExcelService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * @var ExcelService
     */
    private $excelService;


    /**
     * ExcelController constructor.
     * @param ExcelService $excelService
     */
    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function exportUserToExcel()
    {
        $users = User::all();
        $this->excelService->exportToExcel('users', 'users', $users);
    }
}
