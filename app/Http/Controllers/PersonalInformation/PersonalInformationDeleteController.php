<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalInformationDeleteController extends Controller
{
    public function destroy($id){
        DB::table(PersonalInformation::$tableName)->where('id', $id)->delete();
        Log::channel('single-users-action')->info('Удаление одной из моделей "Пернсональная информация"');

        return response()->json(['message' => 'Данные успешно добавлены!'], JSON_UNESCAPED_UNICODE);
    }
}
