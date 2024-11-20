<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        return redirect()->route('homepage')->with('success', 'Registration successful. Welcome to the dashboard.');
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
        return redirect()->route('homepage')->with('success', 'Login successful. Welcome to the dashboard.');
    }

    public function ShowResetPasswordForm($token) {
        return view('website.auths.forgetpassword.resetpassword', ['token' => $token]);
    }
    
    public function ShowForgetPasswordForm() {
        return view('website.auths.forgetpassword.forgetpassword');
    }
    public function SubmitForgotPasswordForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',

        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('website.auths.forgetpassword.email' , ['token' => $token], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Forget Password Reset Link');
        });
        return back()->with('status', 'We have emailed your password reset link!');
    }
    public function SubmitResetPasswordForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
    
        if(!$updatePassword){
            return back()->withInput()->with('error','Invalid Token');
        }
        $user = User::where('email', $request->email)->update(['password'=>Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login');
    }
        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }


}
