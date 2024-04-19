<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureSize\FurnitureSizeAddRequest;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureSizeAddController extends Controller
{
    public function store(FurnitureSizeAddRequest $request){
        $data = $request->validated();

        DB::table(FurnitureSize::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Размеры"');

        return response()->json(['message' => 'Данные успешно добавлены!'], 200);
    }
}
