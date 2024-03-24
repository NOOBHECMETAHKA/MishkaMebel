<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersUpdateController extends Controller
{
    public function update($id){
        $data = \request()->validate([
            'order_status_id' => 'required',
            'enabling_deliveries' => 'required',
        ]);

        DB::table(Order::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Заказы"');

        return response()->json("Данные успешно обновлены", options: JSON_UNESCAPED_UNICODE);
    }
}
