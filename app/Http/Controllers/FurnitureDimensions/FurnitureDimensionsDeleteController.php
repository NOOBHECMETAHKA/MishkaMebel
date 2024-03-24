<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureDimensionsDeleteController extends Controller
{
    public function destroy($id){
        DB::table(FurnitureDimensions::$tableName)->where('id', $id)->delete($id);
        Log::channel('single-users-action')->info('Удаление одной из моделей "Габариты"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
