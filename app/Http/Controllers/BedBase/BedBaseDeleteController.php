<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedBaseDeleteController extends Controller
{
    public function destroy($id){
        DB::table(BedBase::$tableName)->where('id', $id)->delete($id);
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
