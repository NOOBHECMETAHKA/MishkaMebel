<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Http\Requests\MattressCover\MattressCoverAddRequest;
use App\Models\MattressCover;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressCoverAddController extends Controller
{
    public function store(MattressCoverAddRequest $request){
        $data = $request->validated();

        DB::table(MattressCover::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Чехлы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress-cover']);
    }
}
