<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function changTheme($theme){
        Session::put('theme', $theme);
        return redirect()->back();
    }



    public function index()
    {
        return redirect()->route('main-page');
    }
}
