<?php

namespace App\Http\Controllers\Discounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discounts\DiscountsAddRequest;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DiscountsAddController extends Controller
{
    public function store(DiscountsAddRequest $request){
        $data = $request->validated();

        $data['expiration_discount'] = Carbon::parse(str_replace('"', '', $data['expiration_discount']));

        DB::table(Discount::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Скидки"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
