<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureSizeDeleteController extends Controller
{
    public function destroy($id){
        DB::table(FurnitureSize::$tableName)->where('id', $id)->delete($id);
        Log::channel('single-users-action')->info('Удаление одной из моделей "Размеры"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
