<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\MaterialUpdateRequest;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterialUpdateController extends Controller
{
    public function edit($id){
        $object = Material::all()->where('id', $id)->first();
        return View('admin-forms-update-content.material', compact('object'));
    }

    public function update($id, MaterialUpdateRequest $request){
        $data = $request->validated();

        DB::table(Material::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Материал"');

        return redirect()->route('admin-page-content.panel.view', 'material');
    }
}
