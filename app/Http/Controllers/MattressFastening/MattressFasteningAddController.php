<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressFasteningAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'name' => 'string|required|unique:mattress_fastenings'
        ]);

        DB::table(MattressFastening::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Крепления"');

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
