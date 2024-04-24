<?php

namespace App\Http\Controllers;

use App\Classes\ConfigManager;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(){
        $map = ConfigManager::readContent(ConfigManager::$mapStorageURL);
        return View('welcome', compact('map'));
    }
}
