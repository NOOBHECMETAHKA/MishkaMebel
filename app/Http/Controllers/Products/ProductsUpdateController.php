<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsUpdateController extends Controller
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

    public function edit($id){
        $object = Product::query()->where('id', $id)->first();
        return View('admin-forms-update-workspace.products', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'name' => 'required',
            'description' => 'required',
            'guarantee' => 'required',
            'price' => 'required',
            'category' => 'required',
            'products_product_id' => 'required|int'
        ]);

        $data['url_name'] = strtr(mb_strtolower($data['name']), $this->dictionary);

        DB::table(Product::$tableName)->where('id', $id)->update($data);

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }

    public function freeze($id, $function){
        $data = ['is_deleted' => ($function == 'frost') ? 1 : 0];

        DB::table(Product::$tableName)->where('id', $id)->update($data);
        return response()->json(['message' => 'Данные успешно обновлены!']);
    }
}
