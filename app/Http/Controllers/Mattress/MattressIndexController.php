<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use App\Models\Material;
use App\Models\Mattress;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MattressIndexController extends Controller
{
    public function index(){
        $data = Mattress::with([Material::$tableName, FurnitureSize::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Матрас"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
