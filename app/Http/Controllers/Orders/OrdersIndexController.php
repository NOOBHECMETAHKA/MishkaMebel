<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersIndexController extends Controller
{
    public function index(){
        $data = Order::all();
        Log::channel('single-users-action')->info('Вывод данных из модели "Заказы"');
        return OrderResource::collection($data);
    }
}
