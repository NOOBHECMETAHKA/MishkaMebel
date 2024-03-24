<?php

namespace App\Http\Controllers\FurnitureDimensions;

use App\Http\Controllers\Controller;
use App\Models\FurnitureDimensions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class FurnitureDimensionsAddController extends Controller {
    public function store() {
        $data = \request()->validate([
            'length' => ['required'],
            'width' => ['required'],
            'height' => ['required'],
        ]);

        DB::table(FurnitureDimensions::$tableName)->insert($data);
        Log::channel('single-users-action')->info('Добавление одной из моделей "Габариты"');

        return response()->json(['message' => 'Данные успешно добавлены!']);
    }
}
