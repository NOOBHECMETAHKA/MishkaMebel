<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TableDeleteController extends Controller
{
    public function destroy($id){
        DB::table(Table::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Столы"');

        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
