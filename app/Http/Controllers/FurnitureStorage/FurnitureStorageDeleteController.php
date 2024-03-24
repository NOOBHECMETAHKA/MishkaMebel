<?php

namespace App\Http\Controllers\FurnitureStorage;

use App\Http\Controllers\Controller;
use App\Models\FurnitureStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class FurnitureStorageDeleteController extends Controller
{
    public function destroy($id){
        DB::table(FurnitureStorage::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Хранилище вещей"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
