<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class FurnitureStorageIndexController extends Controller
{
    public function index(){
        $data = FurnitureStorage::with([FurnitureDimensions::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Хранилище вещей"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
