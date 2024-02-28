<?php

namespace App\Http\Controllers\Discounts;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountsAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'percent' => 'required|int',
            'expiration_discount' => 'required',
            'discounts_product_id' => 'required|int',
        ]);

        $data['expiration_discount'] = Carbon::parse(str_replace('"', '', $data['expiration_discount']));

        DB::table(Discount::$tableName)->insert($data);

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}