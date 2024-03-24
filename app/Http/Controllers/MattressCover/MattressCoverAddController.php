<?php

namespace App\Http\Controllers\MattressCover;

use App\Http\Controllers\Controller;
use App\Models\MattressCover;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressCoverAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'function' => 'string|required',
            'mattress_fastenings_id' => 'int|required',
            'mattress_covers_furniture_sizes_id' => 'int|required'
        ]);

        DB::table(MattressCover::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Чехлы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress-cover']);
    }
}
