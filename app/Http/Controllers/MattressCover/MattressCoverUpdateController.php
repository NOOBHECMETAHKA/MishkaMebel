<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressCoverUpdateController extends Controller
{
    public function edit($id){
        $object = MattressCover::all()->where('id', $id)->first();
        return View('admin-forms-update-content.mattress-cover', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'function' => 'string|required',
            'mattress_fastenings_id' => 'int|required',
            'mattress_covers_furniture_sizes_id' => 'int|required'
        ]);

        DB::table(MattressCover::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Чехлы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress-cover']);
    }
}
