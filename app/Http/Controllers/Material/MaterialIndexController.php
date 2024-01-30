<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\MaterialIndexRequest;
use App\Models\Material;

class MaterialIndexController extends Controller
{
    public function index(MaterialIndexRequest $request){
        $request_data = $request->validated();
        $data = Material::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
