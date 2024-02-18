<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MattressCoverDeleteController extends Controller
{
    public function destroy($id){
        DB::table(MattressCover::$tableName)->where('id', $id)->delete();
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
