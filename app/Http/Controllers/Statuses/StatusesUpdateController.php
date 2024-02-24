<?php

namespace App\Http\Controllers\Statuses;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusesUpdateController extends Controller
{
    public function edit($id){
        $object = Status::all()->where('id', $id)->first();
        return View('admin-forms-update-workspace.statuses', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'description' => 'string|required|min:3',
            'is_deleted' => '',
        ]);

        if(isset($data['is_deleted'])){
            $data['is_deleted'] = 1;
        } else{
            $data['is_deleted'] = 0;
        }

        DB::table(Status::$tableName)->where('id', $id)->update($data);

        return redirect()->route('admin-page-workspace.panel.view', ['page' => 'statuses']);
    }
}
