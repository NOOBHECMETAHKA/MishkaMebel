<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use App\Models\Material;
use App\Models\Table;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class TableIndexController extends Controller
{
    public function index(){
        $data = Table::with([Material::$tableName, FurnitureDimensions::$tableName, TypeTable::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Столы"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
