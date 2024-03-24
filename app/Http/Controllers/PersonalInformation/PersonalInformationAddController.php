<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalInformationAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'name' => 'required',
            'phone_number' => 'required|unique:personal_information',
            'personal_information_user_id' => 'required',
        ]);

        DB::table(PersonalInformation::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Пернсональная информация"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
