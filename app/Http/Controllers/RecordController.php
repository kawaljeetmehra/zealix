<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecordController extends Controller
{

    public function index()
{
    // Fetch all records from both tables
    $distributors = DB::table('distributors')
        ->select('name', 'contact_name as contact', 'email', DB::raw("'Distributor' as role"))
        ->get();

    $salesmans = DB::table('salesmans')
        ->select('name', 'contact', 'email', DB::raw("'Salesman' as role"))
        ->get();

    // Merge both collections
    $records = $distributors->merge($salesmans);

    // Pass combined records to the view
    return view('UserManagement.index', compact('records'));
}

    public function store(Request $request)
    {
        // Define general validation rules
        $rules = [
            'password' => 'required|string|min:6|confirmed', // Confirm password validation
        ];
        
        // Add distributor-specific validation rules
        if ($request->role === 'distributor') {
            $rules = array_merge($rules, [
                'name' => 'required|string|max:255',
                'contact_name' => 'required|string|max:255',
                'contact' => 'required|string|max:15',
                'email' => 'required|email|max:255|unique:distributors,email',
                'geographic_coverage' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'shipping_location' => 'nullable|string|max:255',
                'terms_of_agreement' => 'nullable|string',
            ]);
        }

        // Add salesman-specific validation rules
        if ($request->role === 'salesman') {
            $rules = array_merge($rules, [
                'name' => 'required|string|max:255',
                'contact' => 'required|string|max:15',
                'email' => 'required|email|max:255|unique:salesmans,email',
                'salesman_id' => 'required|string|max:255',
                'salary' => 'nullable|numeric',
                'salesman_address' => 'nullable|string|max:255',
            ]);
        }

        // Validate the incoming request data
        $validatedData = $request->validate($rules);

        try {
            if ($request->role === 'distributor') {
                // Insert distributor data using the DB facade
                $distributorId = DB::table('distributors')->insertGetId([
                    'name' => $request->name,
                    'contact_name' => $request->contact_name,
                    'contact' => $request->contact,
                    'email' => $request->email,
                    'geographic_coverage' => $request->geographic_coverage,
                    'location' => $request->location,
                    'shipping_location' => $request->shipping_location,
                    'terms_of_agreement' => $request->terms_of_agreement,
                    'role' => 2, // Assuming 2 is the role ID for distributor
                ]);

                // Create user for distributor
                DB::table('users')->insert([
                    'role_id' => 2,
                    'distributor_id' => $distributorId, 
                    'password' => Hash::make($request->password),
                    'email' => $request->email, 
                    'is_active' => $request->is_active ?? 1,
                    'is_deleted' => $request->is_deleted ?? 0,
                ]);

                return response()->json(['success' => true, 'message' => 'Distributor added successfully.']);
            } elseif ($request->role === 'salesman') {
                // Insert salesman data using the DB facade
                $salesmanId = DB::table('salesmans')->insertGetId([
                    'name' => $request->name,
                    'contact' => $request->contact,
                    'email' => $request->email,
                    'salesman_id' => $request->salesman_id,
                    'salary' => $request->salary,
                    'address' => $request->salesman_address,
                    'role' => 3, // Assuming 3 is the role ID for salesman
                ]);

                // Create user for salesman
                DB::table('users')->insert([
                    'role_id' => 3,
                    'salesman_id' => $salesmanId, 
                    'password' => Hash::make($request->password),
                    'email' => $request->email, 
                    'is_active' => $request->is_active ?? 1,
                    'is_deleted' => $request->is_deleted ?? 0,
                ]);

                return response()->json(['success' => true, 'message' => 'Salesman added successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid role specified.'], 400);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors occurred.',
                'errors' => $e->validator->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }
}
