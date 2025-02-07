<?php

namespace App\Http\Controllers;

use App\Models\StallInfo;
use Illuminate\Http\Request;

class StallController extends Controller
{
    public function getExhibition()
    {
        return view('Stall.get_exhibition');
    }


   public function getStall()
   {
      return view('Stall.add_stall');
   }


   public function searchNumber(Request $request)
   {
    //   dd($request);
        $request->validate([
            'mobile_number' => 'required|string|max:15',
        ]);

        $mobileNumber = $request->input('mobile_number');

        // Query the database to find the record
        $stallInfo = StallInfo::where('user_phone', $mobileNumber)->first();

        if ($stallInfo) {
            // dd($stallInfo);
            // Return the desired data
            return response()->json([
                'success' => true,
                'user_name' => $stallInfo->user_name,
                'store_name' => $stallInfo->store_name,
                'status' => $stallInfo->status,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No record found for this mobile number.',
            ]);
        }
   }

//    public function stallRegister(Request $request)
//     {
//         // dd($request->all());
//         // Validate incoming request data
//         $validated = $request->validate([
//             'user_name' => 'required|string|max:255',
//             'store_name' => 'required|string|max:255',
//             'user_address' => 'required|string',
//             'user_city' => 'required|string|max:100',
//             'user_zip_code' => 'required|string|min:6',
//             'user_phone' => 'required|string|max:15',
//             'user_whatsapp' => 'nullable|string|max:15',
//             'user_email' => 'required|email|unique:stall_infos,user_email',
//             'user_collection' => 'required|string|max:255',
//             'user_insta_id' => 'nullable|string|max:255',
//             'main_option' => 'required|in:clothing,food',
//             'stall_type' => 'nullable|in:Large Table,Medium Table,Single Table',
//             'food_option' => 'nullable|in:Large Table,Medium Table',
//             'extra_requirement' => 'required|in:Yes,No',
//             'extra_requirement_details' => 'nullable|string',
//             'promo_code' => 'required|in:Yes,No',
//             'Promo_code_details' => 'nullable|string|max:255',
//             'payment_receipt' => 'required'
//         ]);

//         // dd($request->all(), $validated);

//         // Save the validated data to the database
//         $stallInfo = StallInfo::create($validated);

//         // Return a response (e.g., redirect with success message)
//         return redirect()->back()->with('success', 'Stall booking registered successfully!');
//     }

    public function stallRegister(Request $request)
    {
        // dd($request->all());
        // Validate incoming request data
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
            // 'promo_code' => 'required|in:Yes,No',
            // 'Promo_code_details' => 'nullable|string|max:255',
            'payment_receipt' => 'required',
        ]);

        // dd($request->all(), $validated);

        $imageName = null;

        // Handle the file upload for payment_receipt
        if ($request->hasFile('payment_receipt')) {
            $image = $request->file('payment_receipt');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $validated['payment_receipt'] = $imageName;
        $validated['status'] = 'Pending';

        $cja_large =  4000;
        $cja_medium = 2000;
        $table_10 =  15000;
        $table_7 =   10000;

        $food_large =  4000;
        $food_medium = 2000;
        $table_10 =   15000;
        $table_7 =    10000;

        $stallInfo = $validated;
        if ($validated['main_option'] == 'clothing') {
            if ($validated['stall_type'] == 'Large Table') {
                $stallInfo['total_amount'] = $cja_large;
            } elseif ($validated['stall_type'] == 'Medium Table') {
                $stallInfo['total_amount'] = $cja_medium;
            } elseif ($validated['stall_type'] == '10 Table') {
                $stallInfo['total_amount'] = $table_10;
            } elseif ($validated['stall_type'] == '07 Table') {
                $stallInfo['total_amount'] = $table_7;
            }
            // elseif ($validated['stall_type'] == 'Single Table') {
            //     $stallInfo['total_amount'] = $cja_small;
            // }
        } elseif ($validated['main_option'] == 'food') {
            if ($validated['food_option'] == 'Large Table') {
                $stallInfo['total_amount'] = $food_large;
            } elseif ($validated['food_option'] == 'Medium Table') {
                $stallInfo['total_amount'] = $food_medium;
            } else if ($validated['food_option'] == '10 Table') {
                $stallInfo['total_amount'] = $table_10;
            } else if ($validated['food_option'] == '07 Table') {
                $stallInfo['total_amount'] = $table_7;
            }
        }

        // if ($validated['promo_code'] == 'No') {
              $stallInfo['final_amount'] =  $stallInfo['total_amount'];
        // } else {
        //     $stallInfo['final_amount'] = $request['final_amount'];
        // }

        StallInfo::create($stallInfo);

        return redirect()->back()->with('success', 'Stall booking registered successfully!');
    }


    public function getStallList()
    {
        $stallInfo = StallInfo::orderBy('id', 'desc')->get();
        return view('Stall.list_stall', compact('stallInfo'));
    }

    public function stallStatusUpdate(Request $request, $id)
    {
            // Get the stall info by id
        $stall = StallInfo::findOrFail($id);

        // Update the status field
        $stall->status = $request->status;
        $stall->save();

        // Return response indicating success
        return response()->json(['success' => true, 'status' => $stall->status]);
    }

      public function updatePaymentMode(Request $request, $id)
    {
        try {
            $stall = StallInfo::findOrFail($id);
            $stall->payment_mode = $request->payment_mode;
            $stall->save();

            // Flash success message
            return redirect()->back()->with('success', 'Payment mode updated to ' . $request->payment_mode);
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->back()->with('error', 'Failed to update payment mode.');
        }
    }

    public function updateLogoDesign(Request $request, $id)
    {
        try {
            // Find the record
            $stall = StallInfo::findOrFail($id);

            // Update logo_design field
            $stall->logo_design = $request->logo_design;
            $stall->save();

            // Flash success message
            return redirect()->back()->with('success', 'Logo Design updated to ' . $request->logo_design);
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->back()->with('error', 'Failed to update Logo Design.');
        }
    }

    public function updateExtraNotes(Request $request)
    {
        $validated = $request->validate([
            'stall_id' => 'required|exists:stall_infos,id',
            'extra_notes' => 'required|string|max:1000',
        ]);

        $stall = StallInfo::findOrFail($validated['stall_id']);
        $stall->extra_notes = $validated['extra_notes'];
        $stall->save();

        return response()->json(['success' => true, 'message' => 'Notes updated successfully.']);
    }

      public function deleteStall($id)
    {
        $stall = StallInfo::findOrFail($id);
        $stall->delete();
        return redirect()->back()->with('success', 'Stall deleted successfully.');
    }


}
