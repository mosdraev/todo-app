<?php

namespace App\Http\Controllers;

use App\Models\Task\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Displays home page of the todo application
     *
     * @return void
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Display all task of a user in the Dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        $task = new Task();

        $listTask = $task->where(
            'user_id', Auth::user()->id
        )->get();

        return view('dashboard', [
            'task' => $listTask
        ]);
    }
}
