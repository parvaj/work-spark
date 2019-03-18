<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AppTask;

class TaskController extends Controller
{
    //r

    public function allTasks(){
        $tasks = Task::where('user_id',Auth::user()->id);
        return response()->json([
            'tasks' => $tasks,
            'status' => 'Success'
        ]);
    }

    
    public function store(Request $request){
        $task = new Task;
        $task->name = $request->name;
        $task->user_id = Auth::user()->id;
        $task->save();

        return response()->json([
            'task' => $task,
            'status' => 'Success'
        ]);
    }

    
    public function edit(Request $request){
        $task = Task::find($request->id);
        $task->name = $request->name;
        $task->save();
        return response()->json([
            'task'=>$task,
            'status' => 'Success'
        ]); 
    }

    
    public function delete(Request $request){
        $task = Task::find($request->id);
        $task->delete();
        return response()->json([
            'status'=>'Success'
        ]);
    }

}
