<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressAddRequest;
use App\Http\Resources\Address\AddressAPIResource;
use App\Http\Resources\PersonalInformation\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressesAddController extends Controller
{
    public function store(AddressAddRequest $request){
        $data = $request->validated();

        $id = DB::table(Address::$tableName)->insertGetId($data);
        $data['id'] = $id;
        Log::channel('single-users-action')->info('Добавление одной из моделей "Адрес"');

        return AddressAPIResource::make($data);
    }


}
