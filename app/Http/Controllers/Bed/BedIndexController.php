<?php

namespace App\Http\Controllers\Bed;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use Illuminate\Http\Request;

class BedIndexController extends Controller {
    public function index() {
        $data = Bed::query();
        return response()->json($data->get(), options: JSON_UNESCAPED_UNICODE);
    }
}
