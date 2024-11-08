<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Register Method
    public function register(Request $request) {

        // store all input to $input
        $input = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ];

        // validate request
        $validator = Validator::make($request->all(), [
            "name" => "required|max:255",
            "email" => "email|required",
            "password" => "required|min:6",
        ]);

        // check validate fails
        if($validator->fails()) {
            return response()->json([
                'message' => 'validation errors', 
                'error' => $validator->errors()
            ], 422);
        }

        // create user by $input
        $user = User::create($input);

        // data to return to json
        $data = [
            "message" => "User is created successfully"
        ];

        return response()->json($data, 200);
    }

    // Login Method
    public function login(Request $request) {

        // store all input to $input
        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];
        
        // validate $input
        $validator = Validator::make($input, [
            "email" => "required",
            "password" => "required",
        ]);

        // check if validate fails
        if($validator->fails()) {
            return response()->json([
                'message' => 'validation errors', 
                'error' => $validator->errors()
            ], 422);
        }

        // check if user is registered
        if (Auth::attempt($input)) {
            $token = Auth::user()->createToken('auth_token');

            // data to return to json
            $data = [
                "message" => "Login Successfully",
                "token" => $token->plainTextToken
            ];

            return response()->json($data, 200);
        //  if user not registered
        } else {
            $data = [
                "message" => "username or password is wrong",
            ];

            return response()->json($data, 401);
        }
    }
}
