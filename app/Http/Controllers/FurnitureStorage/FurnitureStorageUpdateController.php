<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class FurnitureStorageUpdateController extends Controller
{
    public function edit($id){
        $object = FurnitureStorage::all()->where('id', $id)->first();
        return View('admin-forms-update-content.furniture-storage', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'type' => 'string|required',
            'furniture_storages_furniture_dimensions_id' => 'int|required'
        ]);

        DB::table(FurnitureStorage::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Хранилище вещей"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'furniture-storage']);
    }
}
