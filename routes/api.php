<?php

use App\Http\Resources\User\UserResource;
use App\Models\User;
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
    $data = User::all()->where('id', $request->user()->id)->first();
    return UserResource::make($data);
});

Route::group([], function () {
    //Get запросы
    Route::get('/types-table', [\App\Http\Controllers\TypeTable\TypeTableIndexController::class, 'index']);
    Route::get('/materials', [\App\Http\Controllers\Material\MaterialIndexController::class, 'index']);
    Route::get('/bed-bases', [\App\Http\Controllers\BedBase\BedBaseIndexController::class, 'index']);
    Route::get('/furniture-sizes', [\App\Http\Controllers\FurnitureSize\FurnitureSizeIndexController::class, 'index']);
    Route::get('/furniture-dimensions', [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsIndexController::class, 'index']);
    Route::get('/mattress-fastenings', [\App\Http\Controllers\MattressFastening\MattressFasteningIndexController::class, 'index']);
    Route::get('/mattresses', [\App\Http\Controllers\Mattress\MattressIndexController::class, 'index']);
    Route::get('/mattress-covers', [\App\Http\Controllers\MattressCover\MattressCoverIndexController::class, 'index']);
    Route::get('/tables', [\App\Http\Controllers\Table\TableIndexController::class, 'index']);
    Route::get('/beds', [\App\Http\Controllers\Bed\BedIndexController::class, 'index']);
    Route::get('/furniture-storage', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageIndexController::class, 'index']);
    Route::get('/personal-information', [\App\Http\Controllers\PersonalInformation\PersonalInformationIndexController::class, 'index']);
    Route::get('/personal-information/{id}', [\App\Http\Controllers\PersonalInformation\PersonalInformationIndexController::class, 'show'])->where(['id', '+[0-9]']);
    Route::get('/photos', [\App\Http\Controllers\Photos\PhotosIndexController::class, 'index']);
    Route::get('/products', [\App\Http\Controllers\Products\ProductsIndexController::class, 'index']);
    Route::get('/catalog/products', [\App\Http\Controllers\Products\ProductsIndexController::class, 'subIndex']);
    Route::get('/statuses', [\App\Http\Controllers\Statuses\StatusesIndexController::class, 'index']);
    Route::get('/addresses', [\App\Http\Controllers\Addresses\AddressesIndexController::class, 'index']);
    Route::get('/orders', [\App\Http\Controllers\Orders\OrdersIndexController::class, 'index']);
    Route::get('/discounts', [\App\Http\Controllers\Discounts\DiscountsIndexController::class, 'index']);
    Route::get('/photos', [\App\Http\Controllers\Photos\PhotosIndexController::class, 'index']);

    Route::post('/types-table/store', [\App\Http\Controllers\TypeTable\TypeTableAddController::class, 'store']);
    Route::post('/mattress-fastenings/store', [\App\Http\Controllers\MattressFastening\MattressFasteningAddController::class, 'store']);
    Route::post('/materials/store', [\App\Http\Controllers\Material\MaterialAddController::class, 'store']);
    Route::post('/furniture-dimensions/store', [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsAddController::class, 'store']);
    Route::post('/furniture-sizes/store', [\App\Http\Controllers\FurnitureSize\FurnitureSizeAddController::class, 'store']);
    Route::post('/addresses/store', [\App\Http\Controllers\Addresses\AddressesAddController::class, 'store']);
    Route::post('/orders/store', [\App\Http\Controllers\Orders\OrdersAddController::class, 'store']);

    Route::post('/products/{id}/freeze/{isFreeze}', [\App\Http\Controllers\Products\ProductsUpdateController::class, 'freeze'])->where(['id','+[0-9]'], ['isFreeze' => 'frost|defrost']);
    Route::post('/products/store', [\App\Http\Controllers\Products\ProductsAddController::class, 'store'])->name('admin.products.store');
    Route::post('/discounts/store', [\App\Http\Controllers\Discounts\DiscountsAddController::class, 'store'])->name('admin.discounts.store');

    Route::post('/orders/update/{id}', [\App\Http\Controllers\Orders\OrdersUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.orders');
    Route::post('/furniture-size/update/{id}', [\App\Http\Controllers\FurnitureSize\FurnitureSizeUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.furniture-size');
    Route::post('/furniture-dimensions/update/{id}', [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.furniture-dimensions');
    Route::post('/products/update/{id}', [\App\Http\Controllers\Products\ProductsUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.product');

    Route::post('/addresses/delete/{id}', [\App\Http\Controllers\Addresses\AddressesDeleteController::class, 'destroy'])->where(['id', '+[0-9]']);
    Route::post('/discounts/delete/{id}', [\App\Http\Controllers\Discounts\DiscountsDeleteController::class, 'destroy'])->where(['id', '+[0-9]']);
    Route::post('/products/delete/{id}', [\App\Http\Controllers\Products\ProductsDeleteController::class, 'destroy'])->where(['id', '+[0-9]']);
    Route::post('/bed/delete/{id}', [\App\Http\Controllers\Bed\BedDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.bed');
    Route::post('/bed-base/delete/{id}', [\App\Http\Controllers\BedBase\BedBaseDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.bed-base');
    Route::post('/furniture-dimensions/delete/{id}', [\App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.furniture-dimensions');
    Route::post('/furniture-size/delete/{id}', [\App\Http\Controllers\FurnitureSize\FurnitureSizeDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.furniture-size')->withoutMiddleware('Sanctum\EnsureFrontendRequestsAreStateful');
    Route::post('/furniture-storage/delete/{id}', [\App\Http\Controllers\FurnitureStorage\FurnitureStorageDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.furniture-storage');
    Route::post('/material/delete/{id}', [\App\Http\Controllers\Material\MaterialDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.material');
    Route::post('/mattress/delete/{id}', [\App\Http\Controllers\Mattress\MattressDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.mattress');
    Route::post('/mattress-cover/delete/{id}', [\App\Http\Controllers\MattressCover\MattressCoverDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.mattress-cover');
    Route::post('/mattress-fastening/delete/{id}', [\App\Http\Controllers\MattressFastening\MattressFasteningDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.mattress-fastening');
    Route::post('/table/delete/{id}', [\App\Http\Controllers\Table\TableDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.table');
    Route::post('/type-table/delete/{id}', [\App\Http\Controllers\TypeTable\TypeTableDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.type-table');
    Route::post('/photos/delete/{id}', [\App\Http\Controllers\Photos\PhotosDeleteController::class, 'destroy'])->where(['id', '+[0-9]']);
    Route::post('/personal-information/store', [\App\Http\Controllers\PersonalInformation\PersonalInformationAddController::class, 'store'])->name('admin-page-content.panel.store.personal-information');
    Route::post('/personal-information/update/{id}', [\App\Http\Controllers\PersonalInformation\PersonalInformationUpdateController::class, 'update'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.update.personal-information');
    Route::post('/personal-information/delete/{id}', [\App\Http\Controllers\PersonalInformation\PersonalInformationDeleteController::class, 'destroy'])->where(['id', '+[0-9]'])->name('admin-page-content.panel.delete.personal-information');
});
