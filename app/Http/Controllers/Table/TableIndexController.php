<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use App\Models\Material;
use App\Models\Table;
use Illuminate\Http\Request;

class TableIndexController extends Controller
{
    public function index(){
        $data = Table::with([Material::$tableName, FurnitureDimensions::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
