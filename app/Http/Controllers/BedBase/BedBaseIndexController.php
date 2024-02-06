<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;


class BedBaseIndexController extends Controller
{
    public function index(){
        $data = BedBase::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
