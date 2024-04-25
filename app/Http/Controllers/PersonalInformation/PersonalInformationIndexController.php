<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class PersonalInformationIndexController extends Controller
{
    public function index() {
        $data = User::all();
        return UserResource::collection($data);
    }

    public function show($id){
        $data = User::all()->where('id', $id);
        return UserResource::collection($data);
    }
}
