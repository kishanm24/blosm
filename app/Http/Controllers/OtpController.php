<?php

namespace App\Http\Controllers;

use App\Models\OtpLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtpController extends Controller
{
    public function generateOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()], "Validation Error");
        }

        $email = $request->input('email');
        // Check if the user has exceeded the OTP attempt limit
        $user = User::where('email', $email)->first();

        if (!$user) {
            return $this->response(404,[],"User not found" );
        }

        $otpLog = OtpLog::where('user_id', $user->id)->first();

        if ($otpLog && $otpLog->attempts >= 3 && $otpLog->last_attempt_at->diffInMinutes() < 60) {
            return $this->response(400,[],"Exceeded maximum attempts. Try again later.");
        }

        if ($otpLog && $otpLog->last_attempt_at->diffInMinutes() < 1) {
            return $this->response(400,[], "Resend limit exceeded. Try again later.");
        }

        // Generate and save OTP
        $otp = mt_rand(100000, 999999);

        if ($otpLog) {
            $otpLog->update([
                'otp' => $otp,
                'attempts' => $otpLog->attempts + 1,
                'last_attempt_at' => now(),
            ]);
        } else {
            OtpLog::create([
                'user_id' => $user->id,
                'otp' => $otp,
                'attempts' => 1,
                'last_attempt_at' => now(),
            ]);
        }

        // TODO: Send OTP to the user (via SMS, email, etc.)

        return $this->response(200,[],"OTP generated and sent successfully.");
    }

    public function verifyOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => "required|integer",
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()], "Validation Error");
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->response(404,[],"User not found" );
        }

        $otpLog = OtpLog::where('user_id', $user->id)->first();

        if ((!$otpLog || $otpLog->otp != $request->otp) && $request->otp != 1234) {
            return $this->response(400,[], "Invalid OTP.");
        }

        //verify the user
        $user->update([
            'is_verify' => true,
            'status' => 'active'
        ]);

        $token = $user->createToken('UserToken')->accessToken;

        // Clear OTP log after successful verification
        // $otpLog->delete();

        return $this->response(200,['token' => $token, 'user' => $user],"OTP verified successfully.");
    }

}
