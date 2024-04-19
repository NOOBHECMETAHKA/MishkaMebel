<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bed\BedAddRequest;
use App\Models\Bed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BedAddController extends Controller
{
    public function store(BedAddRequest $request){
        $data = $request->validated();

        if(isset($data['have_boxes'])){
            $data['have_boxes'] = 1;
        } else{
            $data['have_boxes'] = 0;
        }

        DB::table(Bed::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Кровать"');

        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed']);
    }
}
