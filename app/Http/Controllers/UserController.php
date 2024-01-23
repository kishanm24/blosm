<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'mobile_number' => 'required|string|max:20',
            'avatar' => 'required|string', // You may want to validate the avatar based on your requirements
            'user_name' => 'required|string|max:255',

            'address' => 'required|array',
            'address.street' => 'required|string|max:255',
            'address.city' => 'required|string|max:255',
            'address.state' => 'required|string|max:255',
            'address.zip_code' => 'required|string|max:20',
            'address.country' => 'required|string|max:255',
            'address.phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Set the default role to 'user'
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role', 'user'), // Default to 'user' if 'role' is not provided
            'mobile_number' => $request->input('mobile_number'),
            'avatar' => $request->input('avatar'),
            'user_name' => $request->input('user_name'),
        ]);

        $user->address()->create($request->input('address'));

        return response()->json(['user' => $user], 201);
    }
}
