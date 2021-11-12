<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Render index page
     *
     * @return string|html
     */
    public function create()
    {
        return view('task.index');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function store(Request $request)
    {
        if ($request->has('create-task'))
        {
            $task = new Task();
            $task->user_id = Auth::user()->id;
            $task->title = $request->title;
            $task->description = $request->description;

            $task->save();
        }

        return redirect('/task');
    }
}
