<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use App\Models\Task;
use App\Models\TaskSalesman;
use Illuminate\Http\Request;
use App\Models\TaskStop; // Include TaskStop model for stop data
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // Display the task assignment page with salesmen and tasks data
    public function index()
    { // Fetch assigned task IDs from the task_salesman table
        $assignedTaskIds = TaskSalesman::pluck('task_id')->toArray();
        $salesmans = Salesman::all();
        $tasks = Task::whereNotIn('task_id', $assignedTaskIds)->get();
        $lastTask = Task::orderBy('created_at', 'desc')->first(); // Get the last created task
        $lastTaskId = $lastTask ? $lastTask->task_id : null;
        return view('AssignTask.index', compact('salesmans', 'tasks','lastTaskId'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'priority' => 'required',
            'description' => 'required',
        ]);

        $task = new Task();
        $task->task_id = $request->task_id;
        $task->priority = $request->priority;
        $task->description = $request->description;
        $task->due_date=$request->dueDate;
        $task->save();

        return redirect('/assign')->with('success', 'Task Added Successfully!');
    }

    // Store salesman assignments for tasks
    public function storeSalesman(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'task_ids' => 'required|array',        // Ensure task_ids is an array
            'task_ids.*' => 'required|string',     // Each task_id must be a string
            'salesman_id' => 'required|string',    // Ensure salesman_id is a string
        ]);
    
        // Array to hold any already assigned tasks
        $alreadyAssignedTasks = [];
    
        // Loop through each task ID
        foreach ($request->task_ids as $taskId) {
            // Check if the task is already assigned to the salesman
            $exists = TaskSalesman::where('task_id', $taskId)
                                  ->where('salesman_id', $request->salesman_id)
                                  ->exists();
    
            if ($exists) {
                // If the task is already assigned, add it to the list of already assigned tasks
                $alreadyAssignedTasks[] = $taskId;
            } else {
                // Otherwise, assign the task to the salesman
                TaskSalesman::create([
                    'task_id' => $taskId,
                    'salesman_id' => $request->salesman_id,
                ]);
                  // Also insert data into task_reports table
                  $taskAssign = DB::table('task_assign')
                  ->where('task_id', $taskId)
                  ->first();
      
              if ($taskAssign) {
                  // Step 3: Insert data into task_reports table with the retrieved due_date
                  DB::table('task_report')->insert([
                      'Task_id' => $taskId,
                      'Salesman_id' => $request->salesman_id,
                      'Assign_Date' => now(),
                      'Due_Date' => $taskAssign->due_date, // Retrieved due_date from task_assign
                      'Task_Status' => 'not started', // Default status
                      'Completion_Percentage' => 0.00, // Default completion percentage
                     
                  ]);
              }
            }
        }
    
        // Prepare the response message
        $responseMessage = 'Tasks assigned successfully!';
        if (!empty($alreadyAssignedTasks)) {
            $responseMessage .= ' However, the following tasks were already assigned: ' . implode(', ', $alreadyAssignedTasks);
        }
    
        // Return the response
        return response()->json(['success' => $responseMessage], 200);
    }


    public function routePlanning(Request $request){

        $salesmen = Salesman::all();
        $selectedSalesmanId = $request->get('salesman_id');
    
        // Check if a specific salesman is selected
        
            // Retrieve tasks assigned to the selected salesman with relevant task details
            $tasks = TaskSalesman::where('task_salesman.salesman_id', $selectedSalesmanId)
                ->join('task_assign', 'task_salesman.task_id', '=', 'task_assign.task_id')
                ->leftJoin('task_stops', function ($join) use ($selectedSalesmanId) {
                    $join->on('task_assign.task_id', '=', 'task_stops.task_id')
                         ->where('task_stops.salesman_id', '=', $selectedSalesmanId);
                })
                ->select(
                    'task_assign.task_id',
                    'task_assign.priority',
                    'task_assign.description',
                    'task_stops.stop_1',
                    'task_stops.stop_2',
                    'task_stops.stop_3',
                    'task_stops.stop_4'
                )
                ->get();
    
      
    
        return view('TaskReport.RoutePlanning', compact('salesmen', 'tasks', 'selectedSalesmanId'));
    }
    
    
    public function storeStops(Request $request)
    {   
        $request->validate([
            'task_id' => 'required',
            'salesman_id' => 'required',
            'stops' => 'array|max:4'
        ]);
    
    
         // Check if the task is already assigned
         $existingTaskStop = TaskStop::where('task_id', $request->task_id)
         ->where('salesman_id', $request->salesman_id)
         ->first();
    
    if ($existingTaskStop && $existingTaskStop->is_assigned == 1) {
    // Flash a message if the task is already assigned
    session()->flash('error', 'This task is already assigned and cannot be modified.');
    return redirect()->route('route.planning', ['salesman_id' => $request->salesman_id]);
    }
    
        // Initialize stops with null values
        $stopsData = [
            'stop_1' => $request->stops[0] ?? null,
            'stop_2' => $request->stops[1] ?? null,
            'stop_3' => $request->stops[2] ?? null,
            'stop_4' => $request->stops[3] ?? null,
        ];
    
        $taskStop = TaskStop::updateOrCreate(
            [
                'task_id' => $request->task_id,
                'salesman_id' => $request->salesman_id
            ],
            $stopsData
        );
    
        if ($taskStop->wasRecentlyCreated) {
            session()->flash('success', 'Stops created successfully!');
        } else {
            session()->flash('success', 'Stops updated successfully!');
        }
    
        return redirect()->route('route.planning', ['salesman_id' => $request->salesman_id]);
    }
    
    
    public function assignTasks(Request $request)
    {
        $request->validate([
            'salesman_id' => 'required',
        ]);
    
        $salesmanId = $request->salesman_id;
    
        // Check if all tasks for the salesman are already assigned
        $unassignedTasks = TaskStop::where('salesman_id', $salesmanId)
            ->where('is_assigned', 0)
            ->exists();
    
        if (!$unassignedTasks) {
            // If all tasks are already assigned, show a message and do not proceed
            session()->flash('info', 'All tasks for the selected salesman are already assigned.');
        } else {
            // Update only unassigned tasks
            TaskStop::where('salesman_id', $salesmanId)
                ->where('is_assigned', 0)
                ->update([
                    'is_assigned' => 1,
                    
                ]);
    
            session()->flash('success', 'All unassigned tasks for the selected salesman have been assigned successfully!');
        }
    
        return redirect()->route('route.planning', ['salesman_id' => $salesmanId]);
    }
    
}
