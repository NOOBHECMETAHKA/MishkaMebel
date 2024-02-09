<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use App\Models\Material;
use App\Models\Mattress;
use App\Models\MattressFastening;
use Illuminate\Http\Request;

class MattressIndexController extends Controller
{
    public function index(){
        $data = Mattress::with(Material::$tableName, FurnitureSize::$tableName);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
