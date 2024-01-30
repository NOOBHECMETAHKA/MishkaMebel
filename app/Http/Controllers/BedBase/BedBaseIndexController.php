<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;


class BedBaseIndexController extends Controller
{
    public function index(){
        return response()->json(BedBase::all(), options: JSON_UNESCAPED_UNICODE);
    }
}
