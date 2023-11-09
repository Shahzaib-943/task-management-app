<?php

namespace App\Http\Controllers;

use Toastr;
use Redirect;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeTaskRequest;
use App\Http\Requests\updateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.index');
    }
    public function store(storeTaskRequest $request)
    {
        $data = $request->validated();
        $authUserId = Auth::user()->id;
        if(Task::create(array_merge($data,[
            'user_id' => $authUserId,
        ])))
        {
            return redirect()->back()->with('status', 'Task Created successfully!');
        }
        return view('task.index');
    }

    public function delete(Task $task)
    {
        if($task->delete())
        {
            return redirect()->back()->with('status', 'Task Deleted successfully!');
        }
    }

    public function updateStatus(Task $task)
    {
        if($task->update([
            'status' => 'done'
        ]))
        {
            return redirect()->back()->with('status', 'Task Marked as Done Successfully!');
        }
    }

    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }

    public function update(updateTaskRequest $request,Task $task)
    {
        $data = $request->validated();
        $authUserId = Auth::user()->id;
        if($task->update(array_merge($data,[
            'user_id' => $authUserId,
        ])))
        {
            return redirect()->back()->with('status', 'Task Updated successfully!');
        }
        return view('task.index');
    }
}
