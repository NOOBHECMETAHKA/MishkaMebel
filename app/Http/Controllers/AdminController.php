<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page){
        return View('admin-page.'.$page);
    }

    public function add($page){
        return View('admin-forms.form-add'.$page);
    }
}
