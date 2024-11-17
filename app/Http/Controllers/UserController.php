<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function formPage()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'gender' => $validated['gender'],
            'birthday' => $validated['birthday'],
            'status_active' => $request->has('status_active'),
        ]);

        return redirect()->route('form.page')->with('success', 'User added successfully.');
    }

    public function tablePage()
    {
        $users = User::where('status_active', true)->get();
        return view('table', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('table.page')->with('success', 'User soft deleted.');
    }
}
