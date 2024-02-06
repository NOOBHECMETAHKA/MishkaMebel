<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Models\TypeTable;
use Illuminate\Http\Request;

class TypeTableIndexController extends Controller
{
    public function index(){
        $data = TypeTable::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
