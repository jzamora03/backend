<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //
    // public function index()
    // {
    //     $user = Auth::user(); 
    //     return response()->json($user->tasks);
    // }

    public function index()
    {
        return response()->json(Task::with('user')->get()); 
    }


    public function store(Request $request)
    {
    $user = Auth::user(); 
    if (!$user) {
        return response()->json(['error' => 'Usuario no autenticado'], 401);
    }

    $task = $user->tasks()->create($request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:pendiente,en proceso,completada',
    ]));

    return response()->json($task, 201);
    }



    public function update(Request $request, $id)
    {
        try {
            $task = Task::find($id); 
    
            if (!$task) {
                return response()->json(['message' => 'La tarea no existe'], 404);
            }
    
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|in:pendiente,en proceso,completada',
            ]);
    
            $task->fill($validated); 
            $task->save(); 
    
            return response()->json([
                'message' => 'Tarea actualizada correctamente',
                'task' => $task->refresh()
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error interno', 'error' => $e->getMessage()], 500);
        }
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['message' => 'Tarea eliminada']);
    }

    public function indicators()
    {
        $user = Auth::user(); 
        $totalTasks = $user->tasks()->count();
        $completedTasks = $user->tasks()->where('status', 'completada')->count();
        $pendingTasks = $totalTasks - $completedTasks;
        $progressPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        return response()->json([
            'total_tasks' => $totalTasks,
            'completed_tasks' => $completedTasks,
            'pending_tasks' => $pendingTasks,
            'progress_percentage' => round($progressPercentage, 2),
        ]);
    }

    public function Allindicators()
    {
        $totalTasks = \App\Models\Task::count(); 
        $completedTasks = \App\Models\Task::where('status', 'completada')->count();
        $pendingTasks = $totalTasks - $completedTasks;
        $progressPercentage = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        return response()->json([
            'total_tasks' => $totalTasks,
            'completed_tasks' => $completedTasks,
            'pending_tasks' => $pendingTasks,
            'progress_percentage' => round($progressPercentage, 2),
        ]);
    }


    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Tarea no encontradasss'], 404);
        }
        return response()->json($task);
    } 
    
    public function tasksCompletedByWeek()
{
    $lastMonth = now()->subMonth();

    $tasksByWeek = \App\Models\Task::where('status', 'completada')
        ->whereDate('updated_at', '>=', $lastMonth) 
        ->selectRaw("strftime('%Y-%W', updated_at) as week, COUNT(*) as count") 
        ->groupBy('week')
        ->orderBy('week')
        ->get();

    return response()->json($tasksByWeek);
}

}
