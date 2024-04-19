<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Http\Requests\MattressFastening\MattressFasteningUpdateRequest;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressFasteningUpdateController extends Controller
{
    public function edit($id){
        $object = MattressFastening::all()->where('id', $id)->first();
        return View('admin-forms-update-content.mattress-fastening', compact('object'));
    }

    public function update($id, MattressFasteningUpdateRequest $request){
        $data = $request->validated();

        DB::table(MattressFastening::$tableName)->where('id', $id)->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Крепления"');

        return redirect()->route('admin-page-content.panel.view', 'mattress-fastening');
    }
}
