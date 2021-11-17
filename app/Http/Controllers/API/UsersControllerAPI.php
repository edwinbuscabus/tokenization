<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;

class UsersControllerAPI extends Controller
{
    public $successStatus = 200;

    // public function usersAPI()
    // {
    //     $users = User::all();

    //     if (count($users) > 0) {
    //         return response()->json($users, $this->successStatus);
    //     } else {
    //         return response()->json(['Error' => 'There is no posts in the database'], 404);
    //     }
    // }
    
    public function login()
    {
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $users = Auth::user();

            $success['token'] = Str::random(64);
            $success['username'] = $users->username;
            $success['id'] = $users->id;
            $success['name']= $users->name;

            //SAVE TOKEN
            $users->remember_token = $success['token'];
            $users->save();

            $logs = new Logs();

            $logs->user_id = $users->id;
            $logs->log = "Login";
            $logs['logdetails'] = "User $users->username has logged in into my system";
            $logs['logtype'] = "API login";
            $logs->save();

            return response()->json($success, $this->successStatus);
        } else {
            return response()->json(['response' => 'User not found'], 400);
        }
    }

    public function register(Request $request) {
        $validators = Validator::make($request->all(), [
            'name'=> 'required',
            'username'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if($validators->fails()) {
            return response()->json(['response' => $validators->errors()], 401);
        } else {
            $input = $request->all();

            if (User::where('email', $input['email'])->exists()) {
                return response()->json(['response' => 'Email already exists'], 401);
            } elseif(User::where('username', $input['username'])->exists()) {
                return response()->json(['response' => 'Username already exists'], 401);
            } else {
                $input['password'] = bcrypt($input['password']);
                $users =User::create($input);

                $success['token'] = Str::random(64);
                $success['username'] = $users->username;
                $success['id'] = $users->id;
                $success['name']= $users->name;

                return response()->json($success, $this->successStatus);
            }
        }
        
    }
    
}

?> 