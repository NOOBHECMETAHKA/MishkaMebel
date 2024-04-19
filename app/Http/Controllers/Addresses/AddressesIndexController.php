<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressIndexRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressesIndexController extends Controller
{
    public function index(AddressIndexRequest $request){
        $requestData = $request->validated();

        $data = User::with([Address::$tableName]);

        if(isset($requestData['user_id'])){
            $data = $data->where('id', $requestData['user_id']);
        }

        Log::channel('single-users-action')->info('Вывод данных из модели "Адреса"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
