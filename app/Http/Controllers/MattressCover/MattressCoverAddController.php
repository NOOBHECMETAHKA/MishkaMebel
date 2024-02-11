<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MattressCoverAddController extends Controller
{
    public function add(){

    }
    public function store(){
        $data = \request()->validate([
            'function' => 'string|required',
            'mattress_fastenings_id' => 'int|required',
            'mattress_covers_furniture_sizes_id' => 'int|required'
        ]);

        DB::table(MattressCover::$tableName)->insert($data);

        return redirect()->route('admin-page.panel.view', ['page' => 'mattress-cover']);
    }
}
