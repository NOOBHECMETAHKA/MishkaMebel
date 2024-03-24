<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

class ImageManager
{
    private const DISK = 'public';
    private const CATALOG = '/images';

    public static function save($data){
        return Storage::disk('public')->put('/images', $data);
    }

    public static function delete($link){
        return Storage::disk('public')->delete($link);
    }
}
