<?php

namespace App\Http\Controllers\ControlContent;

use App\Classes\ConfigManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Config;

class MapGeoController extends Controller
{
    public function index(){
        $map = ConfigManager::readContent(ConfigManager::$mapStorageURL);
        return View('admin-page.yandex-map', compact('map'));
    }

    public function change(){
        $data = \request()->validate([
           'mapYandexSRC' => 'required|min:3'
        ]);

        ConfigManager::forseSave(ConfigManager::$mapStorageURL, $data);
        return redirect()->back();
    }
}
