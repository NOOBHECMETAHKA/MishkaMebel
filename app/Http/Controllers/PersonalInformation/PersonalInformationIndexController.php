<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationIndexController extends Controller
{
    public function index() {
        $data = PersonalInformation::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
