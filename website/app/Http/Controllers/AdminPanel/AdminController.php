<?php

namespace App\Http\Controllers\AdminPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;
use App\Models\User;

class AdminController extends BaseController
{
    public function login() {
        return view('admin_panel/admin.login');
    }

    public function loginAction(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && trim($admin->password) === trim($request->password)) {
            Auth::login($admin);
            $request->session()->regenerate();
            $request->session()->put('admin_name', $admin->name);
            $request->session()->put('admin_email', $admin->email);
            $request->session()->put('admin_level', $admin->level ?? 'Admin');
            return redirect()->route('admin.dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

    public function profile()
    {
        return view('admin_panel/admin.profile');
    }

    public function index()
    {
        $user = User::orderBy('created_at', 'ASC')->get();
        return view('admin_panel/users.index', compact('user'));
    }

    public function lockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = true;
        $user->save();
        return redirect()->route('users')->with('success', 'User has been locked successfully.');
    }

    public function unlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = false;
        $user->save();
        return redirect()->route('users')->with('success', 'User has been unlocked successfully.');
    }
}
