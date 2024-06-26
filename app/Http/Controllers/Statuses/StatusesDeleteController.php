<?php

namespace App\Http\Controllers\Statuses;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class StatusesDeleteController extends Controller
{
    public function restore($id){
        $data = ['is_deleted' => 0];
        DB::table(Status::$tableName)->where('id', $id)->update($data);
        Log::info('Изменение одной из моделей "Статусы"');

        return response()->json(['message' => 'Запись успешно восстановлена!'], options: JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id){
        $data = ['is_deleted' => 1];
        DB::table(Status::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Статусы"');

        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
