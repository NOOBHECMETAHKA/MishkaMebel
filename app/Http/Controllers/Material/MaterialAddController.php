<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterialAddController extends Controller
{
    public function store() {
        $data = \request()->validate([
            'name' => 'string|required|unique:materials',
            'appointment' => 'string|required',
        ]);

        DB::table(Material::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Материал"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'material']);
    }

}
