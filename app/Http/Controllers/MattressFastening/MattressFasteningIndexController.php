<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Models\MattressFastening;
use Illuminate\Http\Request;

class MattressFasteningIndexController extends Controller
{
    public function index(){
        $data = MattressFastening::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
