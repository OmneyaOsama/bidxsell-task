<?php

namespace App\Services;

class ExcelService
{
    public function numberToExcelColumn(int $index): string
    {
        if ($index <= 0) {
            throw new \InvalidArgumentException('Index must be a positive integer.');
        }

        $columnTitle = '';
        while ($index > 0) {
            $index--;
            $columnTitle = chr($index % 26 + 65) . $columnTitle;
            $index = intval($index / 26);
        }

        return $columnTitle;
    }
}
