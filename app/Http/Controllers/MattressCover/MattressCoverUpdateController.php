<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Http\Requests\MattressCover\MattressCoverUpdateRequest;
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

    public function update($id, MattressCoverUpdateRequest $request){
        $data = $request->validated();

        DB::table(MattressCover::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Чехлы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress-cover']);
    }
}
