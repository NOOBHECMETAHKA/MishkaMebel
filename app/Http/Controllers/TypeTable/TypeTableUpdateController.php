<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeTable\TypeTableUpdateRequest;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TypeTableUpdateController extends Controller
{
    public function edit($id){
        $object = TypeTable::all()->where('id', $id)->first();
        return View('admin-forms-update-content.type-table', compact('object'));
    }

    public function update($id, TypeTableUpdateRequest $request){
        $data = $request->validated();

        DB::table(TypeTable::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Типы столов"');

        return redirect()->route('admin-page-content.panel.view', 'type-table');
    }
}
