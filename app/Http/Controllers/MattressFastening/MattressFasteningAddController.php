<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Http\Requests\MattressFastening\MattressFasteningAddRequest;
use App\Models\Bed;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressFasteningAddController extends Controller
{
    public function store(MattressFasteningAddRequest $request){
        $data = $request->validated();

        DB::table(MattressFastening::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Крепления"');

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
