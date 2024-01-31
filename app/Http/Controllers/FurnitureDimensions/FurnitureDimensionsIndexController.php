<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Http\Requests\FurnitureDimensions\FurnitureDimensionsIndexRequest;
use App\Models\FurnitureDimensions;
class FurnitureDimensionsIndexController extends Controller
{
    public function index(FurnitureDimensionsIndexRequest $request){
        $request_data = $request->validated();
        $data = FurnitureDimensions::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
