<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformation\PersonalInformationIndexRequest;
use App\Models\Address;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalInformationIndexController extends Controller
{
    public function index() {
        $data = User::with([PersonalInformation::$tableName, Address::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }

    public function show($id){
        $data = User::with([PersonalInformation::$tableName, Address::$tableName])->where('id', $id);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
