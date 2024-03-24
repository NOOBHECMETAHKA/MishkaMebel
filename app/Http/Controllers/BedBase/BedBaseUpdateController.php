<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedBaseUpdateController extends Controller
{
    public function edit($id){
        $object = BedBase::all()->where('id', $id)->first();
        return View('admin-forms-update-content.bed-base', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'name' => ['min:3', 'max:255', 'required']
        ]);

        DB::table(BedBase::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Основание кровати"');

        return redirect()->route('admin-page-content.panel.view', 'bed-base');
    }
}
