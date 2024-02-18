<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationUpdateController extends Controller
{
    public function edit($id){
        $object = PersonalInformation::all()->where('id', $id)->first();
        return View('admin-forms-update-content.personal-information', compact('object'));
    }

    public function update($id){

    }
}
