<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::open()->paginate(10);
        // we have to chain get() if we wrote where condition previously.
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([ 'title' => 'required',  'description' => 'required' ]);
        $targetModel = match($request->input('target_model')){
            'business'   => Business::find($request->input('taskable_id')),
            'person'     => Person::find($request->input('taskable_id'))
        };

        $targetModel->tasks()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->back();
    }

    public function complete(Task $task)
    {
        $task->markAsCompleted();
        return redirect()->back();
    }
}
