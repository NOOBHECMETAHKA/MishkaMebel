<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialDeleteController extends Controller
{
    public function destroy($id){
        $data = DB::table(Material::$tableName)->where('id', $id)->delete();

        if($data == 0){
            return response('Запись не найдена!', status: 404);
        }

        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
