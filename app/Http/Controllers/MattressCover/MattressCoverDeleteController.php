<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressCoverDeleteController extends Controller
{
    public function destroy($id){
        DB::table(MattressCover::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Чехлы"');

        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
