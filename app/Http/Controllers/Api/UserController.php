<?php

namespace App\Http\Controllers\Api;

use DB;
use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;

class UserController extends Controller
{
    public function users(){
    	$users = User::orderBy('name')->paginate(15);


    	//dd($users);

    	return UsersResource::collection($users);
    }
}
