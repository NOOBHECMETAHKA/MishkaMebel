<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\BedBase;
use App\Models\FurnitureSize;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BedIndexController extends Controller {
    public function index() {
        $data = Bed::with([BedBase::$tableName, Material::$tableName, FurnitureSize::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Кровать"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
