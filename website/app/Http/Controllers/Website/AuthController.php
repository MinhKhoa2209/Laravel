<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();

        return view('admin_panel/users.index', compact('user'));
    }

    public function register() {
        return view('website/auths.register');
    }

    public function registerSave(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();
        User::create([
            'name' => $request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'User'
        ]);
        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('dashboard')->with('success', 'Registration successful. Welcome to the dashboard.');
    }

        public function login() {
            return view('website/auths.login');
        }

    public function loginAction(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        $user = User::where('email', $request->email)->first();
        if ($user && $user->locked) {
            throw ValidationException::withMessages([
                'email' => 'Your account has been locked.',
            ]);
        }
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();
        return redirect()->route('dashboard')->with('success', 'Login successful. Welcome to the dashboard.');
    }

        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }


}
