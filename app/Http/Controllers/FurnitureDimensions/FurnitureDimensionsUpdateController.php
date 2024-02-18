<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FurnitureDimensionsUpdateController extends Controller
{
    public function edit($id){
        $object = FurnitureDimensions::all()->where('id', $id)->first();
        return View('admin-forms-update-content.furniture-dimensions', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
        ]);

        DB::table(FurnitureDimensions::$tableName)->where('id', $id)->update($data);

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
