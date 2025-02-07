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


}
