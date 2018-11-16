<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function users(){
    	$users = User::orderBy('name')->paginate(15);


    	//dd($users);

    	return UsersResource::collection($users);
	}
	
	public function login(Request $request){

		if( ! Auth::attempt(['email' => $request->email, 'password' => $request->password])){
			
			return Response::json([
				'status'=>[
					"code" =>401,
					"description"=>"credential is wrong"
				]
				], 401);


		}

		$loggedUser = User::find(Auth::user()->id);


		return(new UsersResource($loggedUser))
		->additional([
			'status'=>[
				"code"=>200,
				"description"=> "OK"
			]
		])->response()->setStatusCode(202);
		
	}

	
}
