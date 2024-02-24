<?php

namespace App\Http\Controllers\Statuses;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusesIndexController extends Controller
{
    public function index(){
        $data = Status::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
