<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressesUpdateController extends Controller
{
    public function update($id, AddressUpdateRequest $request){
        $data = $request->validated();

        DB::table(Address::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Адрес"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
