<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\ValidatorAPI;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterialAddController extends Controller
{
    public function store() {
        $data = \request()->validate([
            'name' => 'string|required|unique:materials',
            'appointment' => 'string|required',
        ]);

        DB::table(Material::$tableName)->insert($data);

        return redirect()->route('admin-page.panel.view', ['page' => 'material']);
    }

    //$validator = Validator::make(request()->toArray(), [
    //            'name' => ['min:3', 'required', 'unique:materials'],
    //            'appointment' => ['min:3', 'required'],
    //        ]);
    //
    //        $valid = ValidatorAPI::getJSONErrors($validator, [
    //            'name' => 'наименование',
    //            'appointment' => 'назначение'
    //        ]);
    //
    //        if($valid){
    //            return response($valid, 400);
    //        }
    //
    //        DB::table(Material::$tableName)->insertOrIgnore($validator->valid());
    //
    //        return response()->json(['message' => 'Данные успешно добавлены!']);
}
