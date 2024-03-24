<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureDimensions\FurnitureDimensionsIndexRequest;
use App\Models\FurnitureDimensions;
use Illuminate\Support\Facades\Log;
class FurnitureDimensionsIndexController extends Controller
{
    public function index(FurnitureDimensionsIndexRequest $request){
        $request_data = $request->validated();
        $data = FurnitureDimensions::query();
        Log::channel('single-users-action')->info('Вывод данных из модели "Габариты"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
