<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        $data = [
            "title" => "Settings",
        ];

        return view('settings.index', $data);
    }

    public function profile(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        User::query()->where('user_id', auth()->user()->user_id)
            ->update($validated);

        return redirect('/settings');
    }
}
