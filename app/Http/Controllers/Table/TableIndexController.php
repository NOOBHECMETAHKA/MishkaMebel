<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableIndexController extends Controller
{
    public function index(){
        $data = Table::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
