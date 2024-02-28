<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class PhotosIndexController extends Controller
{
    public function index(){
        $data = Product::with(Photo::$tableName);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
