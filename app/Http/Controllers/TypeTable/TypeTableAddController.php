<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeTableAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'name' => 'string|required|unique:type_tables'
        ]);

        DB::table(TypeTable::$tableName)->insert($data);

        return response()->json(['message' => 'Данные успешно добавлены!']);
//        return redirect()->route('admin-page.panel.view', ['page' => 'type-table']);
    }
}
