<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FurnitureDimensions\FurnitureDimensionsUpdateController;
use App\Http\Requests\FurnitureDimensions\FurnitureDimensionsUpdateRequest;
use App\Models\FurnitureSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureSizeUpdateController extends Controller
{
    public function edit($id){
        $object = FurnitureSize::all()->where('id', $id)->first();
        return View('admin-forms-update-content.furniture-size', compact('object'));
    }

    public function update($id, FurnitureDimensionsUpdateRequest $request){
        $data = $request->validated();

        DB::table(FurnitureSize::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Размеры"');

        return response()->json(['message' => 'Данные успешно изменены!'], JSON_UNESCAPED_UNICODE);
    }
}
