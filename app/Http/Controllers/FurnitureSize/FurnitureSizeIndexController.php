<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;

class FurnitureSizeIndexController extends Controller
{
    public function index(){
        $data = FurnitureSize::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
