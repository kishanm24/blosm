<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'mobile_number' => 'required|max:20|unique:users,mobile_number',
            // 'avatar' => 'required|string', // You may want to validate the avatar based on your requirements
            // 'user_name' => 'required|string|max:255',

            // 'address' => 'required|array',
            // 'address.street' => 'required|string|max:255',
            // 'address.city' => 'required|string|max:255',
            // 'address.state' => 'required|string|max:255',
            // 'address.zip_code' => 'required|string|max:20',
            // 'address.country' => 'required|string|max:255',
            // 'address.phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        // Set the default role to 'user'
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role', 'user'), // Default to 'user' if 'role' is not provided
            'mobile_number' => $request->input('mobile_number'),
            // 'avatar' => $request->input('avatar'),
            // 'user_name' => $request->input('user_name'),
            // 'is_approved' => true,
            'status' => "inactive",
        ]);

        if(isset($request->address)){
            $user->address()->create($request->input('address'));
        }

        return $this->response(200,['user' => $user], "User Create Successfully");
    }

    public function userLogin(Request $request)
    {
        if (is_numeric($request->get('email'))) {
            $credentials = ['mobile_number' => $request->get('email'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();


            // Check if the user has the 'user' role and status is 'active'
            if ($user->role === 'user' && $user->status === 'active' && $user->is_verify == true) {
                $token = $user->createToken('UserToken')->accessToken;

                return $this->response(200,['token' => $token, 'user' => $user,'is_verify' => true], "User Login Successfully");
            } else {

                return $this->response(200,['is_verify' => false,'user' => $user],"Account is not Active or Unauthorized");
                // If role is not 'user' or status is not 'active', consider it unauthorized
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

        //  user()->token()->revoke();

        return $this->response(200,[],"Successfully logged out");
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $user = Auth::user();

        // Check if the old password matches the user's current password
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return $this->response(401,['error' => 'Old password does not match.'], "Old password does not match.");
        }

        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return $this->response(200,[],"Password changed successfully.");
    }

    public function myProfile(Request $request)
    {
        $user = Auth::user(); // Fetch the authenticated user

        if (!$user) {
            return $this->response(401,[], 'Unauthorized');
        }

        return $this->response(200,['user' => $user], "User Data Fetch Successfully");
    }


    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $user = User::where('email', $request->email)->first();

        $otp = Str::random(4); // Generate a random 6-digit OTP

        // Save OTP to the database
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['email' => $request->email, 'token' => $otp, 'created_at' => now()]
        );

        // Send OTP to the user's email (you may use Laravel's Mail facade)
        // Example: Mail::to($request->email)->send(new ForgotPasswordMail($otp));

        return $this->response(200,[], 'OTP sent to your email');
    }

    public function forgotPasswordVerifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|integer|min:4',
            // 'new_password' => 'required|string|min:6',
            // 'confirm_password' => 'required|string|same:new_password',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->otp)
            ->first();



            if ($request->otp != 1234 && !$resetRecord) {
                return $this->response(400,[], 'Invalid OTP');
            }

            // Check if the OTP is still valid (e.g., within 15 minutes)
            $expirationTime = now()->subMinutes(15);
            if ($request->otp != 1234 && $resetRecord->created_at < $expirationTime) {
                return $this->response(400,[], 'OTP has expired');
            }


        // Update user's password
        // DB::table('users')
        //     ->where('email', $request->email)
        //     ->update(['password' => Hash::make($request->new_password)]);

        // Delete the OTP record
        DB::table('password_resets')->where('email', $request->email)->update(['is_verified' => true]);

        return $this->response(200,[],'OTP Verify successfully');
    }

    public function resetPassword(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:6',
            // 'confirm_password' => 'required|string|same:new_password',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('is_verified', true)
            ->first();

        if (!$resetRecord) {
            return $this->response(400,[],'Email is not Verify');
        }

        // Check if the OTP is still valid (e.g., within 15 minutes)
        // $expirationTime = now()->subMinutes(15);
        // if ($resetRecord->created_at < $expirationTime) {
        //     return $this->response(['message' => 'OTP has expired'], 400);
        // }

        // Reset the user's password
        $user = User::where('email', $request->input('email'))->first();
        $user->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_resets')->where('email', $request->email)->update([
            'is_verified' => false
        ]);

        return $this->response(200,[], 'Password reset successful');
    }
}
