<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalInformationUpdateController extends Controller
{
    public function edit($id){
        $object = PersonalInformation::all()->where('id', $id)->first();
        return View('admin-forms-update-content.personal-information', compact('object'));
    }

    public function update($id){
        $data = \request()->validate([
            'role' => 'required',
        ]);

        $query = DB::table(User::$tableName)->where('id', $id);
        if(count($query->get()) == 0)
            abort(404);

        $query->update($data);
        Log::channel('single-users-action')->info('Изменение одной из моделей "Пернсональная информация"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
