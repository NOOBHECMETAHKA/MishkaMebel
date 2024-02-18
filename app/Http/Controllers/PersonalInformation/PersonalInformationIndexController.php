<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalInformationIndexController extends Controller
{
    public function index() {
        $data = User::query();
        $data->leftJoin(PersonalInformation::$tableName, 'personal_information_user_id', '=', User::$tableName.'.id');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
