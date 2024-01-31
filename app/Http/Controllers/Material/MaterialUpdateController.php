<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\ValidatorAPI;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterialUpdateController extends Controller
{
    public function update($id){
        $validator = Validator::make(request()->toArray(), [
            'name' => ['min:3', 'required'],
            'appointment' => ['min:3', 'required'],
        ]);

        $valid = ValidatorAPI::getJSONErrors($validator, [
            'name' => 'наименование',
            'appointment' => 'назначение'
        ]);

        if($valid){
            return response($valid, 400);
        }

        DB::table(Material::$tableName)->where('id', $id)->update($validator->valid());

        return response()->json(['message' => 'Данные успешно обновлены!']);
    }
}
