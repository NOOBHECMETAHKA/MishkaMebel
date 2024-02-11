<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FurnitureStorageAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'view' => 'string|required',
            'type' => 'string|required',
            'furniture_storages_furniture_dimensions_id' => 'int|required'
        ]);

        DB::table(FurnitureStorage::$tableName)->insert($data);

        return redirect()->route('admin-page.panel.view', ['page' => 'furniture-storage']);
    }
}
