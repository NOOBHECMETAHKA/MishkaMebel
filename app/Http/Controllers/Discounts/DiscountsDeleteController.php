<?php

namespace App\Http\Controllers\Discounts;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DiscountsDeleteController extends Controller
{
    public function destroy($id)
    {
        DB::table(Discount::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Скидки"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
