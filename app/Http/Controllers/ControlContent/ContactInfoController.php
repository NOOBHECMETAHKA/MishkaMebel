<?php

namespace App\Http\Controllers\ControlContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index(){
        return View('admin-page.contact-info');
    }
}
