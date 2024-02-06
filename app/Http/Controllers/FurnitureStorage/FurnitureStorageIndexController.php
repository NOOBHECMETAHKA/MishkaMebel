<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;

class FurnitureStorageIndexController extends Controller
{
    public function index(){
        $data = FurnitureStorage::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
