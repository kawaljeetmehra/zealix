<?php

namespace App\Http\Controllers;

use App\Models\RouteTracking;
use App\Models\Salesman; // Adjust the namespace as per your folder structure
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouteTrackingController extends Controller
{
    // Display a listing of the route tracking entries
    public function index()
    {$salesmen=Salesman::all();
        $routeTrackings = RouteTracking::all(); // Fetch all route tracking entries
        return view('TaskReport.TaDaRoutePlanner', compact('routeTrackings','salesmen'));
    }

    // Show the form for creating a new route tracking entry
   

    // Store a newly created route tracking entry in storage
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'salesman_id' => 'required|string',
            'travel_date' => 'required|date',
            'start_location' => 'required|string',
            'end_location' => 'required|string',
            'distance_traveled' => 'required|numeric',
            'mode_of_transportation' => 'required|string',
            'ta_rate' => 'required|numeric',
            'ta_amount' => 'required|numeric',
            'da_amount' => 'required|numeric',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new route tracking entry
        RouteTracking::create($request->all());

        return redirect()->back()->with('success', 'Route tracking created successfully.');
    }

    // Show the form for editing the specified route tracking entry
    public function edit($id)
    {
        $tracking = RouteTracking::findOrFail($id); // Find the tracking entry by ID
        return view('route-tracking.edit', compact('tracking')); // Return edit view
    }

    // Update the specified route tracking entry in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'salesman_id' => 'required|string',
            'travel_date' => 'required|date',
            'start_location' => 'required|string',
            'end_location' => 'required|string',
            'distance_traveled' => 'required|numeric',
            'mode_of_transportation' => 'required|string',
            'ta_rate' => 'required|numeric',
            'ta_amount' => 'required|numeric',
            'da_amount' => 'required|numeric',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the route tracking entry
        $tracking = RouteTracking::findOrFail($id);
        $tracking->update($request->all());

        return redirect()->back()->with('success', 'Route tracking updated successfully.');
    }

    // Remove the specified route tracking entry from storage
    public function destroy($id)
    {
        $tracking = RouteTracking::findOrFail($id); // Find the tracking entry by ID
        $tracking->delete(); // Delete the tracking entry

        return redirect()->back()->with('success', 'Route tracking deleted successfully.');
    }
}
