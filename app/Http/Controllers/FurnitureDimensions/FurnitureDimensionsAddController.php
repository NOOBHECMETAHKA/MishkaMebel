<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Http\ValidatorAPI;
use App\Models\FurnitureDimensions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class FurnitureDimensionsAddController extends Controller {
    public function store() {
        $data = \request()->validate([
            'length' => ['required'],
            'width' => ['required'],
            'height' => ['required'],
        ]);

        DB::table(FurnitureDimensions::$tableName)->insert($data);

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }

//    $validator = Validator::make(request()->toArray(), [
//            'length' => ['decimal:10,2', 'required'],
//            'width' => ['decimal:10,2', 'required'],
//            'height' => ['decimal:10,2', 'required'],
//        ]);
//
//        $valid = ValidatorAPI::getJSONErrors($validator, [
//            'length' => 'длина',
//            'width' => 'ширина',
//            'height' => 'высота'
//        ]);
//
//        if($valid){
//            return response($valid, 400);
//        }
//
//        DB::table(FurnitureDimensions::$tableName)->insertOrIgnore($validator->valid());
//
//        return response()->json(['message' => 'Данные успешно добавлены!']);
}
