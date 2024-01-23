<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    protected function response($status = 0, $data = [], $message = "")
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ],$status);
    }

    public function createVendor(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6', // You can adjust the password validation rules
                'mobile_number' => 'required|string|max:20',
                'description' => 'nullable|string',
                'logo' => 'nullable|string',
                'vendor_type' => 'required|string',
                // 'is_approved' => 'required|boolean',
                // 'status' => 'required|string',
                'address' => 'required|array',
                'address.street' => 'required|string|max:255',
                'address.city' => 'required|string|max:255',
                'address.state' => 'required|string|max:255',
                'address.zip_code' => 'required|string|max:20',
                'address.country' => 'required|string|max:255',
                'address.phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()], "Error Validation");
        }

        DB::beginTransaction();

        // Create a user with the provided email and password
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'vendor',
            'mobile_number' => $request->input('mobile_number'),
            'avatar' => $request->input('avatar'),
            'user_name' => $request->input('user_name'),
            'description' => $request->input('description'),
            'is_approved' => false,
            'status' => "Inactive",
        ]);

        // Create an address associated with the vendor
        $user->address()->create($request->input('address'));

        DB::commit();
        return $this->response(200,[],"Vendor Created Successfully");
    }

    public function vendorLogin(Request $request)
    {
        if (is_numeric($request->get('email'))) {
            $credentials = ['mobile_number' => $request->get('email'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user has the 'vendor' role and status is 'active'
            if ($user->role === 'vendor' && $user->status === 'active') {
                $token = $user->createToken('VendorToken')->accessToken;

                return $this->response(200,['token' => $token, 'user' => $user], "Vendor Login Successfully");
            } else {
                // If role is not 'vendor' or status is not 'active', consider it unauthorized
                Auth::logout();
                return $this->response(401,[],"Account is not Active or Unauthorized");
            }
        } else {
            return $this->response(401,[],"These credentials do not match our records.");
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

}
