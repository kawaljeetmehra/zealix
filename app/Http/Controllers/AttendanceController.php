<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Salesman;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
class AttendanceController extends Controller
{public function salesmanAttendance(Request $request) {
    // Determine if the logged-in user is a salesman or admin
    if (Auth::user()->role_id == 3) {
        // For salesmen, restrict to only their own attendance
        $selectedSalesmanId = Auth::user()->salesman_id;
        $salesmen = Salesman::where('id', $selectedSalesmanId)->get();
    } else {
        // For admins, show all salesmen
        $salesmen = Salesman::all();
        $selectedSalesmanId = $request->input('salesman_id', $salesmen->first()->id ?? null);
    }

    // Get the selected status filter if provided
    $selectedStatus = $request->input('status', '');

    $attendanceData = [];

    foreach ($salesmen as $salesman) {
        // Only fetch attendance if the salesman ID matches the selectedSalesmanId
        if ($salesman->id == $selectedSalesmanId) {
            $attendanceRecords = Attendance::where('salesman_id', $salesman->id)
                ->when($selectedStatus, function ($query) use ($selectedStatus) {
                    return $query->where('status', $selectedStatus);
                })
                ->get();

            // Initialize attendance data for each month and day with 'N/A'
            $monthlyAttendance = [];
            foreach (range(1, 12) as $month) {
                $days = array_fill(1, 31, 'N/A');
                $monthlyAttendance[$month] = $days;
            }

            // Populate the attendance status for each day from records
            foreach ($attendanceRecords as $record) {
                $month = \Carbon\Carbon::parse($record->day)->month;
                $day = \Carbon\Carbon::parse($record->day)->day;
                $monthlyAttendance[$month][$day] = $record->status;
            }

            $attendanceData[] = (object) [
                'id' => $salesman->id,
                'salesman_id' => $salesman->salesman_id,
                'attendance' => $monthlyAttendance,
            ];
        }
    }

    return view('Attendance.index', compact('salesmen', 'attendanceData', 'selectedSalesmanId', 'selectedStatus'));
}


    


public function store(Request $request)
{
   

    // Validate the incoming request data
    $request->validate([
        'salesman_id' => 'required|exists:salesmans,id',
        'attendance_date' => 'required|date',
        'status' => 'required|string',
    ]);

    $salesmanId = $request->salesman_id;
    $date = $request->attendance_date;
    $status = $request->status;

    // Check if an attendance record already exists for this salesman and date
    $attendanceRecord = Attendance::where('salesman_id', $salesmanId)
        ->where('day', $date)
        ->first();

    if ($attendanceRecord) {
        // Update the existing record
        $attendanceRecord->update([
            'status' => $status,
            'updated_at' => now(),
        ]);
        $message = 'Attendance updated successfully!';
    } else {
        // Create a new record
        Attendance::create([
            'salesman_id' => $salesmanId,
            'day' => $date,
            'status' => $status,
        ]);
        $message = 'Attendance added successfully!';
    }

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

    public function MarkAttendance(Request $request)
    {
        $salesmanId = (int) $request->salesman_id; // Cast to integer to avoid type issues
        $date = date('Y-m-d'); // Current date
        $status = $request->attendance[$date]; // Assuming the status is passed as described
    
        // Ensure status is valid
        if (!in_array($status, ['P', 'A', 'L'])) {
            return response()->json(['error' => 'Invalid status value'], 400);
        }
        $existingAttendance = Attendance::where('salesman_id', $salesmanId)
        ->where('day', $date)
        ->first();

    if ($existingAttendance) {
        return response()->json(['message' => 'Attendance already marked for today'], 400);
    }
    
        // Create attendance record
        Attendance::create([
            'salesman_id' => $salesmanId,
            'day' => $date,
            'status' => $status
        ]);
    
        return response()->json(['message' => 'Attendance recorded successfully']);
    }
    public function getAttendanceStatus(Request $request)
    {
        // Get the authenticated user's ID
        $salesmanId = Auth::user()->salesman_id; // Use the authenticated user's ID
    
        // Get today's date in 'Y-m-d' format
        $date = date('Y-m-d');
    
        // Fetch the attendance record for today
        $attendance = Attendance::where('salesman_id', $salesmanId)
                                 ->where('day', $date)
                                 ->first();
    
        // Check if attendance record exists
        if ($attendance) {
            return response()->json(['status' => $attendance->status]);
        }
    
        // Return null if no attendance record exists for today
        return response()->json(['status' => null]);
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



