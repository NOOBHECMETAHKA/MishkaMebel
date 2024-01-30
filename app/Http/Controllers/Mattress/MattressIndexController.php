<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\MattressFastening;
use Illuminate\Http\Request;

class MattressIndexController extends Controller
{
    public function index(){
        return MattressFastening::all();
    }
}
