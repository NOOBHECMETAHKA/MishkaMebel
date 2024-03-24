<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MaterialDeleteController extends Controller
{
    public function destroy($id){
        DB::table(Material::$tableName)->where('id', $id)->delete($id);
        Log::channel('single-users-action')->info('Удаление одной из моделей "Материал"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
