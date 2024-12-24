@extends('website.layouts.app')
@section('title', 'Reset Password')
@section('content')
        <div class="container mx-auto pt-40 pb-24 ">
            <div class="flex justify-center">
                <div class="max-w-md w-full">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
                        <div class="p-8">
                            <div class="text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-4">Set New Password</h1>
                                <p class="text-sm text-gray-600 mb-6">Please enter your email and a new password.</p>
                            </div>
                            <form action="{{ route('auth.SubmitResetPassword') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="Enter your email address" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" class="form-control font-semibold w-full p-3 border border-gray-400 rounded" placeholder="Confirm New Password" required>
                                </div>
                                <button type="submit" class="bg-blue-600 text-white font-bold py-2 rounded w-full">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
