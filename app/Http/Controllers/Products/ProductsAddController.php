<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsAddRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class ProductsAddController extends Controller
{
    private $dictionary = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
        'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
        'ъ' => '',  // Пустая строка, так как нет прямой замены
        'ы' => 'y', 'ь' => '',  // Пустая строка, так как нет прямой замены
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '_'
    );

    public function store(ProductsAddRequest $request){
        $data = $request->validated();

        $data['url_name'] = strtr(mb_strtolower($data['name']), $this->dictionary);

        DB::table(Product::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Товары"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
