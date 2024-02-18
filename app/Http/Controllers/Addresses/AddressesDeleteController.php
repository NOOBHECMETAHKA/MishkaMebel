<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressesDeleteController extends Controller
{
    public function destroy($id){
        DB::table(Address::$tableName)->where('id', $id)->delete();
        //
    }
}
