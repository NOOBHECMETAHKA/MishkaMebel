<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\ImageManager;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect()->route('admin-page-workspace.panel.view', ['page' => 'photos']);
    }
}
