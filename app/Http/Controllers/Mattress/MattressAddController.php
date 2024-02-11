<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\Mattress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MattressAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'type' => 'string|required',
            'age_category' => 'string|required',
            'hardness' => 'string|required',
            'mattresses_materials_id' => 'int|required',
            'mattresses_furniture_sizes_id' => 'int|required'
        ]);

        DB::table(Mattress::$tableName)->insert($data);

        return redirect()->route('admin-page.panel.view', ['page' => 'mattress']);
    }
}
