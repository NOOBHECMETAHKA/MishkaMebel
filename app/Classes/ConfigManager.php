<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

class ConfigManager
{

    public static $mapStorageURL = '/map-config/config.json';
    public static $contactStorage = '/contact-config/config.json';

    public static function readContent($url) {
        $data = Storage::disk('contact')->get($url);
        if($data != null){
            $data = json_decode($data, JSON_UNESCAPED_UNICODE);
        } else $data = false;

        return $data;
    }

    public static function forseSave($url, $data){
        Storage::disk('contact')->put($url, json_encode($data, JSON_UNESCAPED_UNICODE));
    }



}
