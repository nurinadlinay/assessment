<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.form'); // Ensure this view exists
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'status' => 'nullable|boolean', // Validate the status as a boolean
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->status = $request->has('status') ? 1 : 0; // If the checkbox is checked, set to 1 (active), else 0 (inactive)
        $user->save();

        return redirect()->route('user.index');
    }

    public function index()
    {
        $users = User::where('status', 1)->get();
        return view('user.table', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update(['status' => 0]);
        }

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
