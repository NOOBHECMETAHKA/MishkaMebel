<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformation\PersonalInformationAddRequest;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalInformationAddController extends Controller
{
    public function store(PersonalInformationAddRequest $request){
        $data = $request->validated();

        DB::table(PersonalInformation::$tableName)->updateOrInsert(['personal_information_user_id' => $data['personal_information_user_id']], $data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Пернсональная информация"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
