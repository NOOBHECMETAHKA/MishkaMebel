<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\BedBase;
use App\Models\FurnitureSize;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedUpdateController extends Controller
{
    public function edit($id){
        $object = Bed::with([BedBase::$tableName, Material::$tableName, FurnitureSize::$tableName])->where('id', $id)->first();
        return View('admin-forms-update-content.bed', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'type' => 'string|required',
            'have_boxes' => '',
            'beds_bases_id' => 'int|required',
            'beds_materials_id' => 'int|required',
            'bed_furniture_sizes_id' => 'int|required',
        ]);

        if(isset($data['have_boxes'])){
            $data['have_boxes'] = 1;
        } else{
            $data['have_boxes'] = 0;
        }

        DB::table(Bed::$tableName)->where('id', $id)->update($data);

        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed']);
    }
}
