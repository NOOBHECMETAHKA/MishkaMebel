<?php

namespace App\Http\Controllers\Discounts;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiscountsIndexController extends Controller
{
    public function index(){
        //Добавление к текущегому времени 3 часа так как на сервере оно не точное
        $data = Discount::with([Product::$tableName])
            ->where('expiration_discount', '>', Carbon::now()->addHour(1)->toDate())
            ->orderByDesc('expiration_discount');
        Log::channel('single-users-action')->info('Вывод данных из модели "Скидки"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
