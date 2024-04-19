<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Requests\Table\TableAddRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class TableAddController extends Controller
{
    public function store(TableAddRequest $request){
        $data = $request->validated();

        DB::table(Table::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Столы"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'table']);
    }
}
