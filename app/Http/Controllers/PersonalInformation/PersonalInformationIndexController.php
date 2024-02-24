<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalInformationIndexController extends Controller
{
    public function index() {
        $data = User::with([PersonalInformation::$tableName]);
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
