<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TableAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'type_table_id' => 'int|required',
            'tables_materials_id' => 'int|required',
            'tables_furniture_dimensions_id' => 'int|required',
        ]);

        DB::table(Table::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Столы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'table']);
    }
}
