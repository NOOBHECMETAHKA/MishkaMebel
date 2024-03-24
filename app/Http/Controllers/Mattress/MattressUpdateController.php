<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\FurnitureSize;
use App\Models\Material;
use App\Models\Mattress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressUpdateController extends Controller
{
    public function edit($id){
        $object = Mattress::with([Material::$tableName, FurnitureSize::$tableName])->where('id', $id)->first();

        return View('admin-forms-update-content.mattress', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'type' => 'string|required',
            'age_category' => 'string|required',
            'hardness' => 'string|required',
            'mattresses_materials_id' => 'int|required',
            'mattresses_furniture_sizes_id' => 'int|required'
        ]);

        DB::table(Mattress::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Матрас"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress']);
    }
}
