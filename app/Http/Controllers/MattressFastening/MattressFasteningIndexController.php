<?php

namespace App\Http\Controllers\MattressFastening;

use App\Http\Controllers\Controller;
use App\Models\MattressFastening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MattressFasteningIndexController extends Controller
{
    public function index(){
        $data = MattressFastening::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Крепления"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
