<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Models\TypeTable;
use Illuminate\Http\Request;

class TypeTableIndexController extends Controller
{
    public function index(){



        return TypeTable::all();
    }
}
