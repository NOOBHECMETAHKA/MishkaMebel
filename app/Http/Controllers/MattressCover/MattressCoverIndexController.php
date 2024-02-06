<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use Illuminate\Http\Request;

class MattressCoverIndexController extends Controller
{
    public function index(){
        $data = MattressCover::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
