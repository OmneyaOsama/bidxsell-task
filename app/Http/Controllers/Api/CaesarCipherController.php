<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponseFormate;
use App\Http\Controllers\Controller;
use App\Services\CaesarService;
use Illuminate\Http\Request;

class CaesarCipherController extends Controller
{
    protected $caesarService;

    public function __construct(CaesarService $caesarService)
    {
        $this->caesarService = $caesarService;
    }

    public function encode(Request $request)
    {
        $inputString = $request->query('input_string');
        $shift = (int) $request->query('shift');

        if (!$inputString || !$shift) {
            return ApiResponseFormate::error('Invalid input or shift value.');
        }

        $encodedString = $this->caesarService->encode($inputString, $shift);
        return ApiResponseFormate::success(['encoded' => $encodedString]);
    }
}
