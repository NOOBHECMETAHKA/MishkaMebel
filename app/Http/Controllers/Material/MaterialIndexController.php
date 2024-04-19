<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\MaterialIndexRequest;
use App\Models\Material;
use Illuminate\Support\Facades\Log;
class MaterialIndexController extends Controller
{
    public function index(MaterialIndexRequest $request){
        $request_data = $request->validated();
        $data = Material::query();



        if(isset($request_data['appointment'])){
            $data = $data->where('appointment',
                $request_data['appointment'] === 'material' ? Material::$appointment[1] : Material::$appointment[0]);
        }

        if(isset($request_data['param'])){
            if(isset($request_data['sort'])){
                $data = $data->orderByDesc($request_data['param']);
            } else{
                $data = $data->orderBy($request_data['param']);
            }
        }


        Log::channel('single-users-action')->info('Вывод данных из модели "Материал"');
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
