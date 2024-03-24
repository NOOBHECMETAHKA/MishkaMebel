<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Models\Mattress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        Log::channel('single-users-action')->info('Добавление одной из моделей "Матрас"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress']);
    }
}
