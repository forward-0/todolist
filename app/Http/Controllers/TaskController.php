<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()  {
       return Task::all();

    }
    public function store(Request $request)  {
         return Task::create([
            'name'=>$request->name,
            'status'=>1,
        ]);


    }
    public function update(Request $request,Task $task)  {
        $task->update([
            'name'=>$request->name,
            'status'=>1,
        ]);

    }
    public function delete(Task $task)  {
        $task->delete();

    }
   
    public function show($id)  {
        $task= Task::where('id',$id)->first();
        $task->increment('status');
        return redirect('/');
    }
}
