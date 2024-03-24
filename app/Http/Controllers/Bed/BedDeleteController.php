<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedDeleteController extends Controller
{
    public function destroy($id){
        DB::table(Bed::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Кровать"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
