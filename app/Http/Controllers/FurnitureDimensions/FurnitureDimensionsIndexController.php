<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use App\Models\TypeTable;
use Illuminate\Http\Request;

class FurnitureDimensionsIndexController extends Controller
{
    public function index(){
        return FurnitureDimensions::all();
    }
}
