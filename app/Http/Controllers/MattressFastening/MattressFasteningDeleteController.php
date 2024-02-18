<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MattressFasteningDeleteController extends Controller
{
    public function destroy($id){
        DB::table(MattressFastening::$tableName)->where('id', $id)->delete($id);
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
