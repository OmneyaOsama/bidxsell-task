<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ExcelService;

class ExcelServiceTest extends TestCase
{
    protected $excelService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->excelService = new ExcelService();
    }

    public function test_number_to_excel_column_for_single_letter()
    {
        $this->assertEquals('A', $this->excelService->numberToExcelColumn(1));
        $this->assertEquals('Z', $this->excelService->numberToExcelColumn(26));
    }

    public function test_number_to_excel_column_for_double_letter()
    {
        $this->assertEquals('AA', $this->excelService->numberToExcelColumn(27));
    }
}
