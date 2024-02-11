<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/{page}', [\App\Http\Controllers\AdminController::class, 'index'])->where(['page' =>
'bed|bed-base|furniture-dimensions|furniture-size|furniture-storage|material|mattress|mattress-cover|mattress-fastening|personal-information|table|type-table'])
->name('admin-page.panel.view');

Route::get('/admin/{page}/add', [\App\Http\Controllers\AdminController::class, 'add'])->where(['page' =>
'bed|bed-base|furniture-dimensions|furniture-size|furniture-storage|material|mattress|mattress-cover|mattress-fastening|personal-information|table|type-table'])
->name('admin-page.panel.add-form');

Route::group(["prefix" => "admin"], function($id){
    Route::post('/bed/store', [\App\Http\Controllers\Bed\BedAddController::class, 'store'])->name('admin.bed.store');
    Route::post('/bed-base/store', [\App\Http\Controllers\BedBase\BedBaseAddController::class, 'store'])->name('admin.bed-base.store');
//    Route::post('/furniture-size/store', [\App\Http\Controllers\FurnitureSize\FurnitureSizeAddController::class, 'store'])->name('admin.furniture-size.store');
//    Route::post('/furniture-size/store', [\App\Http\Controllers\FurnitureSize\FurnitureSizeAddController::class, 'store'])->name('admin.furniture-size.store');
    Route::post('/furniture-storage/store', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageAddController::class, 'store'])->name('admin.furniture-storage.store');
    Route::post('/material/store', [\App\Http\Controllers\Material\MaterialAddController::class, 'store'])->name('admin.material.store');
    Route::post('/mattress/store', [\App\Http\Controllers\Mattress\MattressAddController::class, 'store'])->name('admin.mattress.store');
    Route::post('/mattress-cover/store', [\App\Http\Controllers\MattressCover\MattressCoverAddController::class, 'store'])->name('admin.mattress-cover.store');
//    Route::post('/personal-information/store', [\App\Http\Controllers\PersonalInformation\PersonalInformationAddController::class, 'store'])->name('admin.personal-information.store');
    Route::post('/table/store', [\App\Http\Controllers\Table\TableAddController::class, 'store'])->name('admin.table.store');
//    Route::post('/type-table/store', [\App\Http\Controllers\TypeTable\TypeTableAddController::class, 'store'])->name('admin.type-table.store');
});
