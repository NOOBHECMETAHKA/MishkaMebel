<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressesIndexController extends Controller
{
    public function index(){
        $data = Address::with([User::$tableName]);
        Log::channel('single-users-action')->info('Вывод данных из модели "Адреса"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
