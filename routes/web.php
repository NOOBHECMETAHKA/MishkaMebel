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

Route::get('/admin/{page}', [\App\Http\Controllers\AdminController::class, 'indexContent'])->where(['page' =>
'photo|bed|bed-base|furniture-dimensions|furniture-size|furniture-storage|material|mattress|mattress-cover|mattress-fastening|personal-information|table|type-table'])
->name('admin-page-content.panel.view');

Route::get('/admin/{page}/add', [\App\Http\Controllers\AdminController::class, 'add'])->where(['page' =>
'bed|bed-base|furniture-dimensions|furniture-size|furniture-storage|material|mattress|mattress-cover|mattress-fastening|personal-information|table|type-table'])
->name('admin-page-content.panel.add-form');

Route::get('/admin/additional/{page}', [\App\Http\Controllers\AdminController::class, 'indexWorkSpace'])->where(['page' => 'products|statuses|addresses|orders|discounts|photos'])->name('admin-page-workspace.panel.view');;

Route::group(["prefix" => "admin"], function($id){
    Route::post('/bed/store', [\App\Http\Controllers\Bed\BedAddController::class, 'store'])->name('admin.bed.store');
    Route::post('/bed-base/store', [\App\Http\Controllers\BedBase\BedBaseAddController::class, 'store'])->name('admin.bed-base.store');
    Route::post('/furniture-storage/store', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageAddController::class, 'store'])->name('admin.furniture-storage.store');
    Route::post('/material/store', [\App\Http\Controllers\Material\MaterialAddController::class, 'store'])->name('admin.material.store');
    Route::post('/mattress/store', [\App\Http\Controllers\Mattress\MattressAddController::class, 'store'])->name('admin.mattress.store');
    Route::post('/mattress-cover/store', [\App\Http\Controllers\MattressCover\MattressCoverAddController::class, 'store'])->name('admin.mattress-cover.store');
    Route::post('/table/store', [\App\Http\Controllers\Table\TableAddController::class, 'store'])->name('admin.table.store');
});

Route::group(["prefix" => "admin"], function($id){
    Route::get('/bed/edit/{id}', [\App\Http\Controllers\Bed\BedUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.bed');
    Route::get('/bed-base/edit/{id}',  [\App\Http\Controllers\BedBase\BedBaseUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.bed-base');
    Route::get('/furniture-dimensions/edit/{id}',  [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.furniture-dimensions');
    Route::get('/furniture-size/edit/{id}',  [\App\Http\Controllers\FurnitureSize\FurnitureSizeUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.furniture-size');
    Route::get('/furniture-storage/edit/{id}',  [\App\Http\Controllers\FurnitureStorage\FurnitureStorageUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.furniture-storage');
    Route::get('/material/edit/{id}',  [\App\Http\Controllers\Material\MaterialUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.material');
    Route::get('/mattress/edit/{id}',  [\App\Http\Controllers\Mattress\MattressUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.mattress');
    Route::get('/mattress-cover/edit/{id}',  [\App\Http\Controllers\MattressCover\MattressCoverUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.mattress-cover');
    Route::get('/mattress-fastening/edit/{id}',  [\App\Http\Controllers\MattressFastening\MattressFasteningUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.mattress-fastening');
//    Route::get('/personal-information/edit/{id}',  [\App\Http\Controllers\PersonalInformation\PersonalInformationUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.personal-information');
    Route::get('/table/edit/{id}',  [\App\Http\Controllers\Table\TableUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.table');
    Route::get('/type-table/edit/{id}',  [\App\Http\Controllers\TypeTable\TypeTableUpdateController::class, 'edit'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update-form.type-table');


    Route::post('/bed/update/{id}', [\App\Http\Controllers\Bed\BedUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.bed');
    Route::post('/bed-base/update/{id}', [\App\Http\Controllers\BedBase\BedBaseUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.bed-base');
    Route::post('/furniture-storage/update/{id}', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.furniture-storage');
    Route::post('/material/update/{id}', [\App\Http\Controllers\Material\MaterialUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.material');
    Route::post('/mattress/update/{id}', [\App\Http\Controllers\Mattress\MattressUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.mattress');
    Route::post('/mattress-cover/update/{id}', [\App\Http\Controllers\MattressCover\MattressCoverUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.mattress-cover');
    Route::post('/mattress-fastening/update/{id}', [\App\Http\Controllers\MattressFastening\MattressFasteningUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.mattress-fastening');
//    Route::post('/personal-information/update/{id}', [\App\Http\Controllers\PersonalInformation\PersonalInformationUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.personal-information');
    Route::post('/table/update/{id}', [\App\Http\Controllers\Table\TableUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.table');
    Route::post('/type-table/update/{id}', [\App\Http\Controllers\TypeTable\TypeTableUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.type-table');
});


