<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedBaseDeleteController extends Controller
{
    public function destroy($id){
        DB::table(BedBase::$tableName)->where('id', $id)->delete($id);
        Log::channel('single-users-action')->info('Удаление одной из моделей "Основание кровати"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
