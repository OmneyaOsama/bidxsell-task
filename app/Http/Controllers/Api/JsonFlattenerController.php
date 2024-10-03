<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponseFormate;
use App\Http\Controllers\Controller;
use App\Services\JsonFlattenerService;
use Illuminate\Http\Request;

class JsonFlattenerController extends Controller
{
    protected $jsonFlattenerService;

    public function __construct(JsonFlattenerService $jsonFlattenerService)
    {
        $this->jsonFlattenerService = $jsonFlattenerService;
    }

    public function flatten(Request $request)
    {
        $inputJson = $request->query('input_json');
        $jsonArray = json_decode($inputJson, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return ApiResponseFormate::error('Invalid JSON input.');
        }

        $flattened = $this->jsonFlattenerService->flatten($jsonArray);

        return ApiResponseFormate::success($flattened);
    }
}
