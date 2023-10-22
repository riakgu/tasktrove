<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            "title" => "Dashboard",
            "tasks" => \App\Models\Task::query()
                ->where('user_id', auth()->user()->user_id)
                ->where('deadline', date('Y-m-d'))
                ->get(),
            "total_task" => Task::query()->where('user_id', auth()->user()->user_id)->count()
        ];

        return view('dashboard.index', $data);
    }
}
