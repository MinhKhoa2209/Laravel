<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserService
{
    public function registerUser(array $data)
    {
        Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level' => 'User'
        ]);

        Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        return $user;
    }

    public function loginUser(array $data)
    {
        Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        $user = User::where('email', $data['email'])->first();
        if ($user && $user->locked) {
            throw ValidationException::withMessages(['email' => 'Your account has been locked.']);
        }

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $data['remember'] ?? false)) {
            throw ValidationException::withMessages(['email' => trans('auth.failed')]);
        }

        session()->regenerate();
        return $user;
    }

    public function logoutUser()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    }

    public function sendPasswordResetLink(string $email)
    {
        Validator::make(['email' => $email], ['email' => 'required|email|exists:users'])->validate();
        $token = Str::random(64);
        DB::table('password_reset_tokens')->where('email', $email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::send('website.auths.forgetpassword.email', ['token' => $token], function ($message) use ($email) {
            $message->to($email)->subject('Forget Password Reset Link');
        });
    }

    public function resetPassword(array $data)
    {
        Validator::make($data, [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
        ])->validate();

        $resetRecord = DB::table('password_reset_tokens')->where([
            'email' => $data['email'],
            'token' => $data['token'],
        ])->first();

        if (!$resetRecord) {
            throw ValidationException::withMessages(['token' => 'Invalid token']);
        }
        $user = User::where('email', $data['email'])->firstOrFail();
        $user->update(['password' => Hash::make($data['password'])]);
        DB::table('password_reset_tokens')->where('email', $data['email'])->delete();
        return $user;
    }

    public function getUser($userId)
    {
        return User::findOrFail($userId);
    }

}
