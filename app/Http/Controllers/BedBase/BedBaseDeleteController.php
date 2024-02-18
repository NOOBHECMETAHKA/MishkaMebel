<?php

namespace App\Http\Controllers\BedBase;

use App\Http\Controllers\Controller;
use App\Models\BedBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedBaseDeleteController extends Controller
{
    public function destroy($id){
        DB::table(BedBase::$tableName)->where('id', $id)->delete($id);
        return redirect()->route('admin-page-content.panel.view', ['page' => 'bed-base']);
    }
}
