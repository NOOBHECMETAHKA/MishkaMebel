<?php

namespace App\Http\Controllers\Photos;

use App\Classes\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PhotosAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'product_photo_id' => 'required|int',
            'image' => ''
        ]);

        $formPhotoElements = [];

        foreach($data['image'] as $photo){
            $path = ImageManager::save($photo);
            $formPhotoElements[] = [
                'link' => $path,
                'product_photo_id' => $data['product_photo_id'],
            ];
        }

        DB::table(Photo::$tableName)->insert($formPhotoElements);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Фотографии"');

        return redirect()->route('admin-page-workspace.panel.view', ['page' => 'photos']);
    }
}
