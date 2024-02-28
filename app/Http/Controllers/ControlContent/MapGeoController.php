<?php

namespace App\Http\Controllers\ControlContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Config;

class MapGeoController extends Controller
{
    public function index(){
        return View('admin-page.yandex-map');
    }

    public function change(){
        $data = \request()->validate([
           'mapYandexSRC' => 'required|min:3'
        ]);

        Config::set('MAP_YANDEX_MAP_SRC', $data['mapYandexSRC']);

        return redirect()->back();
    }
}
