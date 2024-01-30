<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;

class FurnitureSizeIndexController extends Controller
{
    public function index(){
        return FurnitureSize::all();
    }
}
