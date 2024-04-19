<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Requests\Table\TableUpdateRequest;
use App\Models\FurnitureDimensions;
use App\Models\Material;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TableUpdateController extends Controller
{
    public function edit($id){
        $object = Table::with([Material::$tableName, FurnitureDimensions::$tableName])->where('id', $id)->first();
        return View('admin-forms-update-content.table', compact('object'));
    }

    public function update($id, TableUpdateRequest $request){
        $data = \request()->validate([
            'type_table_id' => 'int|required',
            'tables_materials_id' => 'int|required',
            'tables_furniture_dimensions_id' => 'int|required',
        ]);

        DB::table(Table::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Столы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'table']);
    }
}
