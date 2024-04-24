<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class PhotosIndexController extends Controller
{
    public function index(){
        $data = Product::all();
        Log::channel('single-users-action')->info('Вывод данных из модели "Фотографии"');
        return ProductResource::collection($data);
//        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
