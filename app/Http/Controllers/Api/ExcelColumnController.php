<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponseFormate;
use App\Http\Controllers\Controller;
use App\Services\ExcelService;
use Illuminate\Http\Request;

class ExcelColumnController extends Controller
{
    protected $excelService;

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function getExcelColumn(Request $request, int $index)
    {
        try {
            $columnTitle = $this->excelService->numberToExcelColumn($index);
            return ApiResponseFormate::success(['column' => $columnTitle]);
        } catch (\InvalidArgumentException $e) {
            return ApiResponseFormate::error($e->getMessage());
        }
    }
}
