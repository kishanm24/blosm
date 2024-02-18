<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{

    //Admin Panel Code

    public function index(Request $request)
    {
        try {

            $vendor = User::where('role','vendor')->filter($request->all())->paginate(10);

            return view('admin.vendor.index', [
                'vendors' => $vendor
            ]);


            $bookings = EntryBooking::with('vehicle:vehicle_number,id', 'slot:start_time,end_time,duration,id');

            if($request->api_call == true || $request->api_call == "true") {
                $bookings = $bookings->latest()->take(5)->get();
                return response()->json($bookings);
            }

            $bookings = $bookings->whereNotIN('status' ,[PSConstants::BookingStatus["EXIT"],PSConstants::BookingStatus["EXIT_PAYMENT_REMAINING"] ])->filter($request->all())->orderBy('id','desc')->paginate(10);
            return view('parking_space.entry_booking.index', [
                'bookings' => $bookings
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }



    //API Code for the vendor

    public function createVendor(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'mobile_number' => 'required|unique:users,mobile_number|string|max:20',
                'description' => 'nullable|string',
                'logo' => 'nullable|string',
                'vendor_type' => 'required|string|in:vendor,fashion_designer',
                'business_name' => $request->input('vendor_type') == 'vendor' ? 'required|string' : 'nullable|string',
                'business_logo' => 'nullable|integer',
                'gst_number' => $request->input('vendor_type') == 'vendor' ? 'required_if:vendor_type,vendor|string' : 'nullable|string',
                'gst_certificate_logo' => $request->input('vendor_type') == 'vendor' ? 'required_if:vendor_type,vendor|integer' : 'nullable|integer',

                // 'is_approved' => 'required|boolean',
                // 'status' => 'required|string',
                // 'address' => 'required|array',
                // 'address.street' => 'required|string|max:255',
                // 'address.city' => 'required|string|max:255',
                // 'address.state' => 'required|string|max:255',
                // 'address.zip_code' => 'required|string|max:20',
                // 'address.country' => 'required|string|max:255',
                // 'address.phone' => 'required|string|max:20',
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
            'vendor_type' => $request->input('vendor_type'),
            'business_name' => $request->input('business_name'), // Added field
            'business_logo' => $request->input('business_logo'), // Added field
            'gst_number' => $request->input('gst_number'), // Added field
            'gst_certificate_logo' => $request->input('gst_certificate_logo'), // Added field
        ]);

        // Create an address associated with the vendor
        // $user->address()->create($request->input('address'));

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

    public function unApproveVendor(Request $request)
    {
        try {

            $vendor = User::where('role','vendor')->where('is_approved',false)->where('status','inactive')->filter($request->all())->paginate(10);

            return view('admin.vendor.unapprov_vendor', [
                'vendors' => $vendor
            ]);


            $bookings = EntryBooking::with('vehicle:vehicle_number,id', 'slot:start_time,end_time,duration,id');

            if($request->api_call == true || $request->api_call == "true") {
                $bookings = $bookings->latest()->take(5)->get();
                return response()->json($bookings);
            }

            $bookings = $bookings->whereNotIN('status' ,[PSConstants::BookingStatus["EXIT"],PSConstants::BookingStatus["EXIT_PAYMENT_REMAINING"] ])->filter($request->all())->orderBy('id','desc')->paginate(10);
            return view('parking_space.entry_booking.index', [
                'bookings' => $bookings
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }


}
