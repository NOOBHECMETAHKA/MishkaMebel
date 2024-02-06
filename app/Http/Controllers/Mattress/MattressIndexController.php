<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\Mattress;
use App\Models\MattressFastening;
use Illuminate\Http\Request;

class MattressIndexController extends Controller
{
    public function index(){
        $data = Mattress::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
