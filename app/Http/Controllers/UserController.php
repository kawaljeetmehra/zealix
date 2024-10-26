<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Distributors;
use App\Models\Salesman;


use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
{
    // Fetch users with their respective roles
    $users = User::with(['distributor', 'salesman'])
    ->where('role_id', '!=', 1) 
    ->get(); // Assuming you have relationships set up

    return view('UserManagement.index', compact('users'));
}
public function create(){
    return view ('UserManagement.create');
}
    //
    public function store(Request $request)
    {         
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_role_id'=>'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'qualification' => 'nullable|string',
            'location' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required', // Role can be "distributor" or "salesman"
        ]);

        $role = $request->role; // Either "distributor" or "salesman"
        $isActive = $request->status === 'active' ? 1 : 0;
        if ($role === 'distributor') {
            // Insert into distributors table
            $distributor = Distributors::create([
                'name' => $request->name,
                'contact' => $request->contact_number,
                'qualification' => $request->qualification,
                'email' => $request->email,
                'location' => $request->location,
                'role' => 2, // Assuming 2 is the ID for the distributor role
            ]);

            // Insert into users table with distributor_id
            User::create([
                'Username' => $request->user_role_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2, // Assuming 2 is the ID for the distributor role
                'distributor_id' => $distributor->id,
                'is_active' => $isActive,
            ]);

        } elseif ($role === 'salesman') {
            // Generate Salesman ID
            $salesman_id = 'salesman-' . str_pad(Salesman::count() + 1, 3, '0', STR_PAD_LEFT);

            // Insert into salesmen table
            $salesman = Salesman::create([
                'salesman_id' => $salesman_id,
                'name' => $request->name,
                'email'=>$request->email,
                'contact' => $request->contact_number,
                'qualification' => $request->qualification,
                'address' => $request->location,
                'role' => 3, // Assuming 3 is the ID for the salesman role
            ]);

            // Insert into users table with salesman_id
            User::create([
                'Username' =>$request->user_role_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 3, // Assuming 3 is the ID for the salesman role
                'salesman_id' => $salesman->id,
                'is_active' => $isActive,
            ]);
        }

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        // Find the user by ID
        $user = User::with(['distributor', 'salesman'])->findOrFail($id);
    
    //  dd($user->toArray());
    
      
    
        return view('UserManagement.edit', compact('user'));
    }



    public function update(Request $request, $id)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'user_role_id' => 'required|string|max:255',
        'contact_number' => 'required|string|max:15',
        'qualification' => 'nullable|string',
        'location' => 'nullable|string',
        'email' => 'required|email|unique:users,email,' . $id, // Ignore current user's email
        'password' => 'nullable|string|min:8', // Password is optional for updates
        'role' => 'required', // Role can be "distributor" or "salesman"
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Determine if the user is active or inactive
    $isActive = $request->status === 'active' ? 1 : 0;

    // Handle updating based on role
    if ($request->role === 'distributor') {
        // Update distributor details
        $distributor = Distributors::where('id', $user->distributor_id)->first();
        if ($distributor) {
            $distributor->update([
                'name' => $request->name,
                'contact' => $request->contact_number,
                'qualification' => $request->qualification,
                'email' => $request->email,
                'location' => $request->location,
                'role' => 2, // Assuming 2 is the ID for the distributor role
            ]);
        }

        // Update user details
        $user->update([
            'Username' => $request->user_role_id,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Only update password if provided
            'role_id' => 2, // Assuming 2 is the ID for the distributor role
            'is_active' => $isActive,
        ]);

    } elseif ($request->role === 'salesman') {
        // Update salesman details
        $salesman = Salesman::where('id', $user->salesman_id)->first();
        if ($salesman) {
            $salesman->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact_number,
                'qualification' => $request->qualification,
                'address' => $request->location,
                'role' => 3, // Assuming 3 is the ID for the salesman role
            ]);
        }

        // Update user details
        $user->update([
            'Username' => $request->user_role_id,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Only update password if provided
            'role_id' => 3, // Assuming 3 is the ID for the salesman role
            'is_active' => $isActive,
        ]);
    }

    return redirect()->route('user.index')->with('success', 'User updated successfully.');
}


public function destroy($id)
{
    // Find the user with relationships
    $user = User::with(['distributor', 'salesman'])->findOrFail($id);

    // The deleting logic is handled in the User model's boot method

    // Now delete the user
    $user->delete();

    // Redirect with a success message
    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
}

}
