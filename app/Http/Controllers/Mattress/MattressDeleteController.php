<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\Mattress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressDeleteController extends Controller
{
    public function destroy($id){
        DB::table(Mattress::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Матрас"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
