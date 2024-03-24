<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedBaseAddController extends Controller
{
    public function store(){
        $data = \request()->validate([
            'name' => 'string|required|unique:bed_bases'
        ]);

        DB::table(BedBase::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Основание кровати"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed-base']);
    }
}
