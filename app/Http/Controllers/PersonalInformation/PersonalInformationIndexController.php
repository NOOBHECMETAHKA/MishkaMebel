<?php

namespace App\Http\Controllers\PersonalInformation;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformation\PersonalInformationIndexRequest;
use App\Http\Resources\PersonalInformation\PersonalInformationResource;
use App\Http\Resources\PersonalInformation\UserResource;
use App\Models\Address;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Http\Request;

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
