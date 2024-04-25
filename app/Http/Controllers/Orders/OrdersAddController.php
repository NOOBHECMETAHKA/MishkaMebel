<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrdersAddRequest;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersAddController extends Controller
{
    public function store(OrdersAddRequest $request){
        $data = $request->validated();
        $order = $this->checkout($data);
        $orderLists = [];
        foreach($data['order_list'] as $orderItem){
            $orderLists[] = [
                'price_sum_product' => $orderItem['price_sum_product'],
                'count_product' => $orderItem['count_product'],
                'product_order_list_id' => $orderItem['product_order_list_id'],
                'order_order_list_id' => $order['id']
            ];
        }
        DB::table(OrderList::$tableName)->insert($orderLists);

        $order['order_lists'] = $orderLists;

        return $order;
    }

    public function checkout($data){
        $data = [
            'ordered_in' => date('Y-m-d H:i:s'),
            'total_cost' => $data['total_cost'],
            'order_status_id' => Status::all()->first()->id,
            'order_address_id' => $data['order_address_id'],
            'create_at' => date('Y-m-d H:i:s'),
        ];

        $idOrder = DB::table(Order::$tableName)->insertGetId($data);
        $data['id'] = $idOrder;
        return $data;
    }
}
