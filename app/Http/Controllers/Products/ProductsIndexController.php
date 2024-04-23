<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Filters\Product\ProductFilter;
use App\Http\Requests\Products\ProductIndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Discount;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ProductsIndexController extends Controller
{
    public function index(ProductIndexRequest $request){
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $data = Product::filter($filter)->get();
        Log::channel('single-users-action')->info('Вывод данных из модели "Товары"');
        return ProductResource::collection($data);
    }
}
