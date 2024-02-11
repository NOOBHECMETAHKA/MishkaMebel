<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'tables_materials_id' => 'int|required',
            'tables_furniture_dimensions_id' => 'int|required',
        ]);

        DB::table(Table::$tableName)->insert($data);

        return redirect()->route('admin-page.panel.view', ['page' => 'table']);
    }
}
