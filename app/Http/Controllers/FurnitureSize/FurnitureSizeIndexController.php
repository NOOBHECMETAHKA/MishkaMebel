<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FurnitureSizeIndexController extends Controller
{
    public function index(){
        $data = FurnitureSize::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Размеры"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
