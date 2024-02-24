<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsIndexController extends Controller
{
    public function index(){
        $data = Product::with([Discount::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
