<?php

namespace App\Http\Controllers\Photos;

use App\Http\Controllers\Controller;
use App\Http\ImageManager;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosDeleteController extends Controller
{
    public function destroy($id)
    {
        $query = DB::table(Photo::$tableName)->where('product_photo_id', $id);
        $data = $query->get();
        foreach($data as $el){
            ImageManager::delete($el->link);
        }
        $query->delete();
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
