<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use Illuminate\Support\Facades\Log;


class BedBaseIndexController extends Controller
{
    public function index(){
        $data = BedBase::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Основание кровати"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
