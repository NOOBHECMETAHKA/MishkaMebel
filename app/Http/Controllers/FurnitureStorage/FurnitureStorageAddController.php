<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureStorage\FurnitureStorageAddRequest;
use App\Models\FurnitureDimensions;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureStorageAddController extends Controller
{
    public function store(FurnitureStorageAddRequest $request){
        $data = $request->validated();

        DB::table(FurnitureStorage::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Хранилище вещей"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'furniture-storage']);
    }
}
