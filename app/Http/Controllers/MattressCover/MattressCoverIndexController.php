<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use App\Models\Material;
use App\Models\MattressCover;
use App\Models\MattressFastening;
use Illuminate\Http\Request;

class MattressCoverIndexController extends Controller
{
    public function index(){
        $data = MattressCover::with([MattressFastening::$tableName, FurnitureSize::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
