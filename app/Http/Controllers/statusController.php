<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class statusController extends Controller
{
    public function status(Task $task)  {

        return $task->increment('status');

   }


       public function swapWeights(Request $request, $taskOne, $task)
       {
           // دریافت مقادیر weight از درخواست
           $weightOne = $request->input('weight_one');
           $weightTwo = $request->input('weight_two');

           // یافتن تسک‌ها بر اساس ID
           $firstTask = Task::findOrFail($taskOne);
           $secondTask = Task::findOrFail($task);

           // جابجایی مقادیر weight
           $tempWeight = $weightOne;
           $weightOne = $weightTwo;
           $weightTwo = $tempWeight;

           return response()->json([
               'success' => true,
               'message' => 'مقادیر weight با موفقیت جابجا شدند',
               'data' => [
                   'task_one' => [
                       'id' => $firstTask->id,
                       'new_weight' => $weightOne
                   ],
                   'task_two' => [
                       'id' => $secondTask->id,
                       'new_weight' => $weightTwo
                   ]
               ]
           ]);
       }
   }



