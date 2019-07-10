<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('completed', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('taskList', [
            'tasks' => $tasks
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

    public function complete(Request $request)
    {
        Task::where('id', $request->id)
            ->update(['completed' => 1]);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        Task::where('id', $request->id)
            ->delete();

        return redirect('/');
    }
}
