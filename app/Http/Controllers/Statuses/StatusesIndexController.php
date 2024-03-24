<?php

namespace App\Http\Controllers\Statuses;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class StatusesIndexController extends Controller
{
    public function index(){
        $data = Status::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Статусы"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
