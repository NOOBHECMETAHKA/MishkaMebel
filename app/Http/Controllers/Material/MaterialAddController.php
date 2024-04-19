<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\MaterialAddRequest;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterialAddController extends Controller
{
    public function store(MaterialAddRequest $request) {
        $data = $request->validated();

        DB::table(Material::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Материал"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'material']);
    }

}
