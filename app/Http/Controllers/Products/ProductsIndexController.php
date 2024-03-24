<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ProductsIndexController extends Controller
{
    public function index(){
        $data = Product::with([Discount::$tableName, Photo::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Товары"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
