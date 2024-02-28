<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\ImageManager;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosUpdateController extends Controller
{
    public function edit($id){
        $object = Product::query()->where('id', $id)->first();
        return View('admin-forms-update-workspace.photos', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'image' => 'array|min:1|max:3|required'
        ]);

        $formPhotoElements = [];

        foreach($data['image'] as $photo){
            $path = ImageManager::save($photo);
            $formPhotoElements[] = [
                'link' => $path,
                'product_photo_id' => $id,
            ];
        }

        DB::table(Photo::$tableName)->insert($formPhotoElements);

        return redirect()->route('admin-page-workspace.panel.view', ['page' => 'photos']);
    }
}
