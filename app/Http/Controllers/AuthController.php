<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    // Create New User
    public function registerStore(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'role' => ['required', 'in:teacher,student'],
            'birth_date' => ['required', 'date'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // Hash Password
        $request['password'] = bcrypt($formFields['password']);
        $user = User::create($request->except('birth_date'));

        $request['join_date'] = now();
        $request['last_login'] = now();
        $request['user_id'] = $user->id;
        if ($request['role'] == User::TEACHER) {
            Teacher::create($request->only(['name', 'birth_date', 'join_date', 'last_login', 'user_id']));
        } elseif ($request['role'] == User::STUDENT) {
            Student::create($request->only(['name', 'birth_date', 'join_date', 'last_login', 'user_id']));
        }

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function loginForm()
    {
        return view('auth.login');
    }

    // Authenticate User
    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
