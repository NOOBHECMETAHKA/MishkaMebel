<?php

namespace App\Http\Controllers\FurnitureSize;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FurnitureSizeAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'length' => 'required',
            'width' => 'required',
        ]);

        DB::table(FurnitureSize::$tableName)->insert($data);

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
        //return redirect()->route('admin-page-content.panel.view', ['page' => 'furniture-size']);
    }
}
