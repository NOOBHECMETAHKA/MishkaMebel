<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeTable\TypeTableAddRequest;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeTableAddController extends Controller
{
    public function store(TypeTableAddRequest $request){
        $data = $request->validated();

        DB::table(TypeTable::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Типы столов"');

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
