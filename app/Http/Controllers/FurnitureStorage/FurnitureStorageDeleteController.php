<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FurnitureStorageDeleteController extends Controller
{
    public function destroy($id){
        DB::table(FurnitureStorage::$tableName)->where('id', $id)->delete();
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
