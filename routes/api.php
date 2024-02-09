<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'TypeTable', 'prefix' => 'types-table'], function (){
   Route::get('/', [\App\Http\Controllers\TypeTable\TypeTableIndexController::class, 'index']);
});

Route::group(['namespace' => 'FurnitureDimensions', 'prefix' => 'furniture-dimensions'], function (){
    Route::get('/', [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsIndexController::class, 'index']);
});

Route::group(['namespace' => 'Material', 'prefix' => 'materials'], function ($id){
    Route::get('/', [\App\Http\Controllers\Material\MaterialIndexController::class, 'index']);
    Route::post('/store', [\App\Http\Controllers\Material\MaterialAddController::class, 'store']);
    Route::put('/update/{id}', [\App\Http\Controllers\Material\MaterialUpdateController::class, 'update']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\Material\MaterialDeleteController::class, 'destroy']);
});

Route::group(['namespace' => 'BedBase', 'prefix' => 'bed-bases'], function (){
    Route::get('/', [\App\Http\Controllers\BedBase\BedBaseIndexController::class, 'index']);
});

Route::group(['namespace' => 'FurnitureSize', 'prefix' => 'furniture-sizes'], function (){
    Route::get('/', [\App\Http\Controllers\FurnitureSize\FurnitureSizeIndexController::class, 'index']);
});

Route::group(['namespace' => 'MattressFastening', 'prefix' => 'mattress-fastenings'], function (){
    Route::get('/', [\App\Http\Controllers\MattressFastening\MattressFasteningIndexController::class, 'index']);
});

Route::group(['namespace' => 'Mattress', 'prefix' => 'mattresses'], function (){
    Route::get('/', [\App\Http\Controllers\Mattress\MattressIndexController::class, 'index']);
});

Route::group(['namespace' => 'MattressCover', 'prefix' => 'mattress-covers'], function (){
    Route::get('/', [\App\Http\Controllers\MattressCover\MattressCoverIndexController::class, 'index']);
});

Route::group(['namespace' => 'MattressFastening', 'prefix' => 'mattress-fastenings'], function (){
    Route::get('/', [\App\Http\Controllers\MattressFastening\MattressFasteningIndexController::class, 'index']);
});

Route::group(['namespace' => 'Table', 'prefix' => 'tables'], function (){
    Route::get('/', [\App\Http\Controllers\Table\TableIndexController::class, 'index']);
});

Route::group(['namespace' => 'Bed', 'prefix' => 'beds'], function (){
    Route::get('/', [\App\Http\Controllers\Bed\BedIndexController::class, 'index']);
});

Route::group(['namespace' => 'FurnitureStorage', 'prefix' => 'furniture-storage'], function () {
    Route::get('/', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageIndexController::class, 'index']);
});
