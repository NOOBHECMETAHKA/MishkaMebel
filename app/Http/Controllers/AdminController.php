<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexContent($page)
    {
        return View('admin-page-content.' . $page);
    }

    public function indexWorkSpace($page)
    {
        return View('admin-page-workspace.' . $page);
    }

    public function addContent($page)
    {
        return View('admin-forms-add-content.' . $page);
    }

    public function addWorkSpace($page)
    {
        return View('admin-forms-add-workspace.' . $page);
    }
}
