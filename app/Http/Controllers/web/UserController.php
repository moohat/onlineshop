<?php

namespace App\Http\Controllers\web;

use DB;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function users(){
    	$users = User::IsNotadmin()->paginate(10);



    	//dd($users);

    	return view('admin.users.index', compact('users'));
    }
}
