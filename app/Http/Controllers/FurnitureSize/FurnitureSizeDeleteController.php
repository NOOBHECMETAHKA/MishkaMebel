<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FurnitureSizeDeleteController extends Controller
{
    public function destroy($id){
        DB::table(FurnitureSize::$tableName)->where('id', $id)->delete($id);
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
