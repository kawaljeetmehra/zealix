<?php

namespace App\Http\Controllers;

use App\Models\TaskReport;
use App\Models\TaskSalesman;
use App\Models\Salesman;
use Illuminate\Http\Request;

class TaskReportController extends Controller
{
    // Display a listing of tasks
    public function index()
    {
        // Fetch all tasks
        $salesmen = Salesman::all();
        $tasks = TaskReport::all();
        
        // Return view with tasks data
        return view('TaskReport.index', compact('tasks','salesmen'));
    }

    // Show the form for creating a new task
    public function getTasksBySalesman($salesmanId)
{
    // Fetch task IDs from the task_salesman table
    $tasks = TaskSalesman::where('Salesman_id', $salesmanId)->pluck('Task_id');
    
    // Return as JSON
    return response()->json(['tasks' => $tasks]);
}


    // Store a newly created task in storage
    public function store(Request $request)
    {   
        // Validate incoming request
        $request->validate([
            'salesman_id' => 'required',
            'task_id' => 'required',
            'assign_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:assign_date',
        ]);
    
        // Check for duplicate entries
        $duplicateTask = TaskReport::where('Salesman_id', $request->input('salesman_id'))
                              ->where('Task_id', $request->input('task_id'))
                              ->where('Assign_date', $request->input('assign_date'))
                              ->first();
    
        if ($duplicateTask) {
            // Redirect with an error message if a duplicate is found
            return redirect()->back()->withErrors(['error' => 'This task has already been assigned to the salesman on the selected date.']);
        }
    
        // Create a new Task record
        $task = new TaskReport();
        $task->Salesman_id = $request->input('salesman_id');
        $task->Task_id = $request->input('task_id');
        $task->Assign_date = $request->input('assign_date');
        $task->Due_date = $request->input('due_date');
        
        // Save the task to the database
        $task->save();
    
        // Redirect to task list with success message
        return redirect()->url('tasks')->with('success', 'Task created successfully.');
    }
    
    // Show the form for editing a specified task
    public function edit($id)
    {   
        // Fetch task by ID
        $task = TaskReport::where('Report_id', $id)
        ->join('salesmans', 'salesmans.salesman_id', '=', 'Task_Report.Salesman_id')
        ->join('task_assign', 'task_assign.task_id', '=', 'Task_Report.Task_id')
        ->select('Task_Report.*', 'salesmans.*','task_assign.*') // Add more fields if needed
        ->first();
       
       
        // Return edit view with task data
        return view('TaskReport.edit', compact('task'));
    }

    // Update the specified task in storage
    public function update(Request $request, $id)
{ 
    // Find the task by ID
    $request->validate([
        'taskstatus' => 'required|string',
        'assign_date' => 'required|date',
        'due_date' => 'required|date',
    ]);

    $task = TaskReport::where('Report_id', $id)->first();

    // Update task fields based on the form input
    $task->Task_Status = $request->taskstatus;
    $task->Assign_Date = $request->assign_date;
    $task->Due_Date = $request->due_date;

    // Update completion percentage based on status
    $task->Completion_Percentage = match ($request->taskstatus) {
        'in-progress' => 50,
        'completed' => 100,
        default => 0,
    };

    
    
    $task->save();

    return redirect()->back()->with('success', 'Task updated successfully.');
}


    // Remove the specified task from storage
   
}