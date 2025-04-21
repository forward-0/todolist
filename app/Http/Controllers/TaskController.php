<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()  {
        $tasks=Task::all();
        return view('welcome',compact('tasks'));
    }
    public function storeTask(Request $request)  {
        Task::create([
            'name'=>$request->name,
            'status'=>1,
            'exoiration_date'=>$request->date,
        ]);
        return redirect('/');
    }
    public function delete($id)  {
        Task::find($id)->delete();
        return redirect('/');
    }
    public function status($id)  {
        $task= Task::where('id',$id)->first();
        $task->increment('status');
        return redirect('/');
    }
}
