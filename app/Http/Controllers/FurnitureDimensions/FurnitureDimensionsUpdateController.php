<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureDimensions\FurnitureDimensionsUpdateRequest;
use App\Models\FurnitureDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FurnitureDimensionsUpdateController extends Controller
{
    public function edit($id){
        $object = FurnitureDimensions::all()->where('id', $id)->first();
        return View('admin-forms-update-content.furniture-dimensions', compact('object'));
    }

    public function update($id, FurnitureDimensionsUpdateRequest $request ){
        $data = $request->validated();

        DB::table(FurnitureDimensions::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Габариты"');

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
