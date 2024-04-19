<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bed\BedUpdateRequest;
use App\Models\Bed;
use App\Models\BedBase;
use App\Models\FurnitureSize;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedUpdateController extends Controller
{
    public function edit($id){
        $object = Bed::with([BedBase::$tableName, Material::$tableName, FurnitureSize::$tableName])->where('id', $id)->first();
        return View('admin-forms-update-content.bed', compact('object'));
    }

    public function update($id, BedUpdateRequest $request){
        $data = $request->validated();

        if(isset($data['have_boxes'])){
            $data['have_boxes'] = 1;
        } else{
            $data['have_boxes'] = 0;
        }

        DB::table(Bed::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Кровать"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed']);
    }
}
