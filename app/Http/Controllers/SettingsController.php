<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'email',
        ]);

        $current_email = auth()->user()->email;

        if($validated['email'] === $current_email) {
            User::query()->where('user_id', auth()->user()->user_id)
                ->update(['name' => $validated['name']]);
        } else {
            $request->validate([
                'email' => 'unique:users',
            ]);
            User::query()->where('user_id', auth()->user()->user_id)
                ->update($validated);
        }

        return redirect('/settings')->with('success', 'Profile has been updated!' );
    }

    public function password(Request $request) {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $current_password = auth()->user()->password;

        if (Hash::check($request->current_password, $current_password)) {
            if (Hash::check($request->password, $current_password)) {
                return redirect('/settings')->with('error', 'The new password cannot be the same as the old password!' );
            }
            else{
                $users = User::query()->find(auth()->user()->user_id);
                $users->password = Hash::make($validated['password']);
                $users->save();
                return redirect('/settings')->with('success', 'Password has been updated!' );
            }
        }
        else{
            return redirect('/settings')->with('error', 'The old password does not match.' );
        }
    }
}
