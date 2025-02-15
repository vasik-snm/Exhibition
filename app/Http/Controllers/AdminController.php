<?php

namespace App\Http\Controllers;

use App\Models\OrderInfo;
use App\Models\StallInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PhpParser\PrettyPrinter\Standard;

class AdminController extends Controller
{
    public function index() {
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($validator->passes());
        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password])){
                // dd(Auth::guard('admin')->user());
                if(Auth::guard('admin')->user()-> role != "admin"){
                    return redirect()->route('login')->with('error', 'Enter valid email or password...');

                }
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            }else{
                return redirect()->route('login')->with('error', 'Enter valid email or password...');
            }
        }else{
            return redirect()->route('login')->with('error', 'Enter valid email or password...');
        }
     }

     public function dashboard()
     {
         // Ensure only authenticated admins can access the dashboard
         if (!Auth::guard('admin')->check()) {
             return redirect()->route('login')->with('error', 'Unauthorized access.');
         }

        $approve_stall_count = StallInfo::where('status', "Approved")->count();

        $pending_stall_count = StallInfo::where('status', 'Pending')->count();

        $rejected_stall_count = StallInfo::where('status', 'Rejected')->count();

        $total_stall_count = StallInfo::count();


         // Pass the count to the view
         return view('Admin.index', compact('approve_stall_count', 'pending_stall_count', 'total_stall_count', 'rejected_stall_count'));

        //  return view('Admin.index');
     }


    public function getAdminProfile($id)
    {
        // Retrieve the authenticated admin using the 'admin' guard
        $authenticatedAdmin = Auth::guard('admin')->user();

        if (!$authenticatedAdmin) {
            abort(404, 'Admin not found.'); // Handle if admin is not found
        }

        // Check if the authenticated admin matches the requested $id
        if ($authenticatedAdmin->id != $id) {
            abort(403, 'Unauthorized action.'); // Handle unauthorized access
        }

        // Retrieve the admin based on the provided $id
        $admin = User::findOrFail($id);
        // dd($admin);

        return view('Admin.profile', compact('admin'));
    }


    public function updateAdminProfile(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            // Add more validation rules as per your requirements
        ]);

        // Find the admin based on the $id
        $admin = User::findOrFail($id);

        // Update admin details
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->phone = $validatedData['phone'];

        // Update password if provided
        if (!empty($validatedData['password'])) {
            $admin->password = Hash::make($validatedData['password']);
        }

        // Save admin record
        $admin->save();

        // Optionally, you can return a response or redirect as per your application flow
        return redirect()->route('Admin.profile', ['id' => $id])->with('success', 'Admin details updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    public function adminStallAdd()
    {
        return view('Admin.add_stall');
    }

    // public function adminStallARegister(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate incoming request data
    //     $validated = $request->validate([
    //         'user_name' => 'required|string|max:255',
    //         'store_name' => 'required|string|max:255',
    //         'user_address' => 'required|string',
    //         'user_city' => 'required|string|max:100',
    //         'user_zip_code' => 'required|string|min:6',
    //         'user_phone' => 'required|string|max:15',
    //         'user_whatsapp' => 'nullable|string|max:15',
    //         'user_email' => 'nullable|email|unique:stall_infos,user_email',
    //         'user_collection' => 'required|string|max:255',
    //         'user_insta_id' => 'nullable|string|max:255',
    //         'main_option' => 'required|in:clothing,food',
    //         'stall_type' => 'nullable|in:Large Table,Medium Table,10 Table,07 Table',
    //         'food_option' => 'nullable|in:Large Table,Medium Table,10 Table,07 Table',
    //         'extra_requirement' => 'nullable|in:Yes,No',
    //         'extra_requirement_details' => 'nullable|string',
    //         // 'promo_code' => 'required|in:Yes,No',
    //         // 'Promo_code_details' => 'nullable|string|max:255',
    //         'payment_receipt' => 'required',
    //     ]);

    //     // dd($request->all(), $validated);

    //     $imageName = null;

    //     // Handle the file upload for payment_receipt
    //     if ($request->hasFile('payment_receipt')) {
    //         $image = $request->file('payment_receipt');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('images'), $imageName);
    //     }

    //     $validated['payment_receipt'] = $imageName;
    //     $validated['status'] = 'Pending';

    //     $cja_large =  4000;
    //     $cja_medium = 2000;
    //     $table_10 =  15000;
    //     $table_7 =   10000;

    //     $food_large =  4000;
    //     $food_medium = 2000;
    //     $table_10 =   15000;
    //     $table_7 =    10000;

    //     $stallInfo = $validated;
    //     if ($validated['main_option'] == 'clothing') {
    //         if ($validated['stall_type'] == 'Large Table') {
    //             $stallInfo['total_amount'] = $cja_large;
    //         } elseif ($validated['stall_type'] == 'Medium Table') {
    //             $stallInfo['total_amount'] = $cja_medium;
    //         } elseif ($validated['stall_type'] == '10 Table') {
    //             $stallInfo['total_amount'] = $table_10;
    //         } elseif ($validated['stall_type'] == '07 Table') {
    //             $stallInfo['total_amount'] = $table_7;
    //         }
    //         // elseif ($validated['stall_type'] == 'Single Table') {
    //         //     $stallInfo['total_amount'] = $cja_small;
    //         // }
    //     } elseif ($validated['main_option'] == 'food') {
    //         if ($validated['food_option'] == 'Large Table') {
    //             $stallInfo['total_amount'] = $food_large;
    //         } elseif ($validated['food_option'] == 'Medium Table') {
    //             $stallInfo['total_amount'] = $food_medium;
    //         } else if ($validated['food_option'] == '10 Table') {
    //             $stallInfo['total_amount'] = $table_10;
    //         } else if ($validated['food_option'] == '07 Table') {
    //             $stallInfo['total_amount'] = $table_7;
    //         }
    //     }

    //     // if ($validated['promo_code'] == 'No') {
    //           $stallInfo['final_amount'] =  $stallInfo['total_amount'];
    //     // } else {
    //     //     $stallInfo['final_amount'] = $request['final_amount'];
    //     // }

    //     StallInfo::create($stallInfo);

    //     return redirect()->back()->with('success', 'Stall booking registered successfully!');
    // }

    public function adminStallARegister(Request $request)
    {
        // dd($request->all());

        // Validate request data
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'user_address' => 'required|string',
            'user_city' => 'required|string|max:100',
            'user_zip_code' => 'required|string|min:6',
            'user_phone' => 'required|string|max:15',
            'user_whatsapp' => 'nullable|string|max:15',
            'user_email' => 'nullable|email|unique:stall_infos,user_email',
            'user_collection' => 'required|string|max:255',
            'user_insta_id' => 'nullable|string|max:255',
            'main_option' => 'required|in:clothing,food',
            'stall_type' => 'nullable|in:Large Table,Medium Table,10 Table,07 Table',
            'food_option' => 'nullable|in:Large Table,Medium Table,10 Table,07 Table',
            'extra_requirement' => 'nullable|in:Yes,No',
            'extra_requirement_details' => 'nullable|string',
            'payment_receipt' => 'nullable', // Payment optional for admin
            'role' => 'required|in:admin' // ✅ Fixed validation
        ]);
        // dd($validated);

        // ✅ Convert role to boolean (1 for admin, 0 for user)
        $validated['role'] = $validated['role'] === 'admin' ? 1 : 0;

        // ✅ Skip Payment Upload for Admin
        if ($validated['role'] === 0 && $request->hasFile('payment_receipt')) {
            $image = $request->file('payment_receipt');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['payment_receipt'] = $imageName;
        } else {
            $validated['payment_receipt'] = null; // Admin ke liye no payment proof
        }

        $validated['status'] = 'Pending';

        // ✅ Pricing Logic
        $pricing = [
            'clothing' => ['Large Table' => 4000, 'Medium Table' => 2000, '10 Table' => 15000, '07 Table' => 10000],
            'food' => ['Large Table' => 4000, 'Medium Table' => 2000, '10 Table' => 15000, '07 Table' => 10000]
        ];

        $stallInfo = $validated;
        if ($validated['main_option'] === 'clothing' && isset($pricing['clothing'][$validated['stall_type']])) {
            $stallInfo['total_amount'] = $pricing['clothing'][$validated['stall_type']];
        } elseif ($validated['main_option'] === 'food' && isset($pricing['food'][$validated['food_option']])) {
            $stallInfo['total_amount'] = $pricing['food'][$validated['food_option']];
        } else {
            $stallInfo['total_amount'] = 0;
        }

        $stallInfo['final_amount'] = $stallInfo['total_amount'];

        // ✅ **Skip Payment Processing if Admin (`role == 1`)**
        StallInfo::create($stallInfo);

       return redirect()->route('getStallList')->with('success', 'Stall booking registered successfully' . ($validated['role'] ? ' without payment!' : '!'));

    }



}
