<?php

namespace App\Http\Controllers\Mattress;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mattress\MattressAddRequest;
use App\Models\Mattress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MattressAddController extends Controller
{
    public function store(MattressAddRequest $request){
        $data = $request->validated();

        DB::table(Mattress::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Матрас"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'mattress']);
    }
}
