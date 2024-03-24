<?php

namespace App\Http\Controllers\Photos;

use App\Classes\ImageManager;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        Log::channel('single-users-action')->info('Удаление одной из моделей "Фотографии"');
        return response()->json(['message' => 'Запись успешно удалена!'], options: JSON_UNESCAPED_UNICODE);
    }
}
