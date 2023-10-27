<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        $data = [
            "title" => "Settings",
        ];

        return view('settings.index', $data);
    }
}
