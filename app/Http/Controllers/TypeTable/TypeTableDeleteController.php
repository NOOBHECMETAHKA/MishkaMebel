<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TypeTableDeleteController extends Controller
{
    public function destroy($id){
        DB::table(TypeTable::$tableName)->where('id', $id)->delete($id);
        Log::channel('single-users-action')->info('Удаление одной из моделей "Типы столов"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
