<?php

namespace App\Http\Controllers\TypeTable;

use App\Http\Controllers\Controller;
use App\Models\TypeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class TypeTableIndexController extends Controller
{
    public function index(){
        $data = TypeTable::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Типы столов"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
