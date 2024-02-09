<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\BedBase;
use App\Models\FurnitureSize;
use App\Models\Material;
use Illuminate\Http\Request;

class BedIndexController extends Controller {
    public function index() {
        $data = Bed::with([BedBase::$tableName, Material::$tableName, FurnitureSize::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
