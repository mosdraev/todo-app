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
        return view('task.create');
    }

    /**
     * Update task
     *
     * @return string|html
     */
    public function update($id)
    {
        $task = Task::findOrFail($id);

        return view('task.update', [
            'task' => $task
        ]);
    }

    /**
     * Delete a Task
     *
     * @param int $id Task id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if ($task->delete())
        {
            return redirect('dashboard');
        }

        return back();
    }

    /**
     * Create task
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
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

        return redirect('/create');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function modify(Request $request)
    {
        $id = $request->id;

        if ($request->has('update-task'))
        {
            $task = Task::findOrFail($request->id);

            // Update task data
            $task->title = $request->title;
            $task->description = $request->description;

            $id = $task->update() ? $task->id : $id;
        }

        return redirect('/view/' . $id);
    }

    /**
     * Undocumented function
     *
     * @param int $id Task id
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $task = Task::findOrFail($id);

        return view('task.view', [
            'task' => $task
        ]);
    }
}
