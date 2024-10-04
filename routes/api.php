<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExcelColumnController;
use App\Http\Controllers\Api\CaesarCipherController;
use App\Http\Controllers\Api\JsonFlattenerController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\EventController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('problems')->group(function () {
    Route::get('/excel-column/{index}', [ExcelColumnController::class, 'getExcelColumn']);
    Route::get('/caesar-cipher', [CaesarCipherController::class, 'encode']);
    Route::get('/json-flattener', [JsonFlattenerController::class, 'flatten']);
});


Route::get('/events', [EventController::class, 'index']);
Route::get('/events/show', [EventController::class, 'show']);
Route::post('/events/store', [EventController::class, 'store']);
Route::post('/tickets', [TicketController::class, 'store']);
