<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressAddRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressesAddController extends Controller
{
    public function store(AddressAddRequest $request){
        $data = $request->validated();

        DB::table(Address::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Адрес"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }


}
