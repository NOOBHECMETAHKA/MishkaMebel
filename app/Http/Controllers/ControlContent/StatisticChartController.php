<?php

namespace App\Http\Controllers\ControlContent;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\FurnitureStorage;
use App\Models\Mattress;
use App\Models\MattressCover;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class StatisticChartController extends Controller
{
    public function index(){
        $statisticCountProducts = DB::transaction(function () {
            $data['countMattress'] = count(Mattress::all());
            $data['countMattressCover'] = count(MattressCover::all());
            $data['countBed'] = count(Bed::all());
            $data['countFurnitureStorage'] = count(FurnitureStorage::all());
            $data['countTable'] = count(Table::all());
            return $data;
        });
        return View('admin-page.panel', compact('statisticCountProducts'));
    }
}
