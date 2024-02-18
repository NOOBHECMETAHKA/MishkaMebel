<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedAddController extends Controller
{
    public function store(){
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

        DB::table(Bed::$tableName)->insert($data);

        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed']);
    }
}
