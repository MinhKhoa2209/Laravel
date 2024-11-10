<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function register()
    {
        return view('website/auths.register');
    }

    public function registerSave(Request $request)
    {
        $this->userService->registerUser($request->all());
        return redirect()->route('homepage')->with('success', 'Registration successful. Welcome to the dashboard.');
    }

    public function login()
    {
        return view('website/auths.login');
    }

    public function loginAction(Request $request)
    {
        $this->userService->loginUser($request->all());
        return redirect()->route('homepage')->with('success', 'Login successful. Welcome to the dashboard.');
    }

    public function logout()
    {
        $this->userService->logoutUser();
        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }

    public function showResetPasswordForm($token)
    {
        return view('website.auths.forgetpassword.resetpassword', ['token' => $token]);
    }

    public function showForgetPasswordForm()
    {
        return view('website.auths.forgetpassword.forgetpassword');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $this->userService->sendPasswordResetLink($request->email);
        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $this->userService->resetPassword($request->all());
        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }
}
