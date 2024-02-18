<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MattressFasteningUpdateController extends Controller
{
    public function edit($id){
        $object = MattressFastening::all()->where('id', $id)->first();
        return View('admin-forms-update-content.mattress-fastening', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'name' => ['min:3', 'max:255', 'required'],
        ]);

        DB::table(MattressFastening::$tableName)->where('id', $id)->update($data);
        return redirect()->route('admin-page-content.panel.view', 'mattress-fastening');
    }
}
