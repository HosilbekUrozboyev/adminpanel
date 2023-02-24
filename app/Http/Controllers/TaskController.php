<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
//use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks(){

        $tasks = \App\Models\Task::all();


        return view('table', [
            'tasks' => $tasks,
        ]);
    }
}
