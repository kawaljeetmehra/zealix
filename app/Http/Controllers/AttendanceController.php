<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Salesman;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
class AttendanceController extends Controller
{
    //
    public function salesmanAttendance(){

        $salesmen = Salesman::all();
        $attendances = [];
        
        foreach ($salesmen as $salesman) {
            // Fetch attendance for each salesman
            $attendanceRecords = Attendance::where('salesman_id', $salesman->id)
                ->get();
        
            // Initialize attendance array with 'N/A'
            $attendanceArray = array_fill(1, 30, 'N/A');
        
            foreach ($attendanceRecords as $record) {
                // Extract the day from the 'day' column in your attendance table
                $day = \Carbon\Carbon::parse($record->day)->day; // Use Carbon to get the day of the month
                $attendanceArray[$day] = $record->status; // Set the attendance status for that day
            }
        
            $attendances[] = (object) [
                'id' => $salesman->id,
                'salesman_id' => $salesman->salesman_id,
                'attendance' => $attendanceArray,
            ];
        }
        
        return view('Attendance.index', compact('salesmen', 'attendances'));
    }


    public function store(Request $request)
    {  
        // Validate the incoming request data
        $request->validate([
            'salesman_id' => 'required|exists:salesmans,id',
            'attendance' => 'required|array',
        ]);
    
        // Get the salesman ID
        $salesmanId = $request->salesman_id;
    
        // Initialize a flag to check if any record was updated
        $anyUpdated = false;
    
        // Loop through each day in the attendance array and create or update individual records
        foreach ($request->attendance as $dayNumber => $status) {
            // Calculate the specific date based on the day number
            $date = Carbon::now()->startOfMonth()->addDays($dayNumber - 1)->toDateString();
    
            // Check if an attendance record already exists for this salesman and day
            $attendanceRecord = Attendance::where('salesman_id', $salesmanId)
                ->where('day', $date)
                ->first();
    
            if ($attendanceRecord) {
                // If it exists, update the existing record
                $attendanceRecord->update([
                    'status' => $status,
                    'updated_at' => now(), // Update the timestamp if necessary
                ]);
                // Set the updated flag to true
                $anyUpdated = true;
            } else {
                // If it doesn't exist, create a new record
                Attendance::create([
                    'salesman_id' => $salesmanId,
                    'day' => $date, // Store as a full date
                    'status' => $status,
                ]);
            }
        }
    
        // Set the success message based on whether any record was updated or added
        $message = $anyUpdated ? 'Attendance updated successfully!' : 'Attendance added successfully!';
        
        return redirect()->back()->with('success', $message);
    }

    public function update(Request $request, $id)
    {
        // Find the attendance record by ID
        $attendance = Attendance::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'salesman_id' => 'required',
            'attendance' => 'required|array',
            // Add additional validation rules as necessary
        ]);

        // Update the attendance record
        $attendance->update([
            'salesman_id' => $request->salesman_id,
            'attendance' => $request->attendance,
            // Update other fields as necessary
        ]);

        return redirect()->back()->with('success', 'Attendance updated successfully!');
    }

    public function showAttendance()
    {
        $salesmanId = Auth::id(); // Get the logged-in salesman ID
    $attendances = Attendance::where('salesman_id', $salesmanId)
                             ->orderBy('day')
                             ->get();

    // Initialize the yearly attendance array
    $yearlyAttendance = [];

    foreach ($attendances as $attendance) {
        // Extract month and day from the 'day' field
        $month = date('n', strtotime($attendance->day)); // Numeric representation of a month (1 to 12)
        $day = date('j', strtotime($attendance->day));   // Day of the month without leading zeros

        // Initialize the month array if not set
        if (!isset($yearlyAttendance[$month])) {
            $yearlyAttendance[$month] = [];
        }

        // Store attendance status
        $yearlyAttendance[$month][$day] = $attendance->status;
    }
    
        return view('Attendance.salesmanAttendence', compact('yearlyAttendance'));
    }
    
protected function getAttendanceForYear($salesmanId)
{
    $attendance = []; // Initialize array to hold yearly attendance data

    // Loop through each month (1 to 12) to get attendance data
    for ($month = 1; $month <= 12; $month++) {
        $attendance[$month] = $this->getMonthlyAttendance($salesmanId, $month);
    }

    return $attendance;
}

protected function getMonthlyAttendance($salesmanId, $month)
{
    // Fetch attendance data for the given salesman and month
    // This would depend on your database structure; adjust as needed
    // Example:
    return Attendance::where('salesman_id', $salesmanId)
                     ->whereMonth('day', $month)
                     ->pluck('status', 'day')
                     ->toArray();
}
}



