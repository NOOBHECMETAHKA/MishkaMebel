<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class PhotosIndexController extends Controller
{
    public function index(){
        $data = Product::with(Photo::$tableName);
        Log::channel('single-users-action')->info('Вывод данных из модели "Фотографии"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
