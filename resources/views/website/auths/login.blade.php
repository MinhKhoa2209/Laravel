@extends('website.layouts.app')
@section('title', 'Login')
@section('content')
        <div class="container mx-auto pt-40 pb-24 ">
            <div class="flex justify-center">
                <div class="max-w-md w-full">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
                        <div class="p-8">
                            <div class="text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-4">WELCOME BACK!</h1>
                            </div>
                            <form action="{{ route('login.action') }}" method="POST" class="space-y-4">
                                @csrf
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
                                    <input name="email" type="email" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user font-semibold  w-full p-3 border border-gray-300 rounded" id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="flex items-center mb-4">
                                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="customCheck" name="remember">
                                        <label class="ml-2 text-sm text-gray-600" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="bg-black text-white font-bold py-2 rounded w-full">Login</button>
                            </form>

                            <hr class="my-4">
                            <div class="text-center">
                                <a class="text-sm text-blue-600 hover:underline" href="{{route('auth.forgetPassword')}}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="text-sm text-blue-600 hover:underline" href="{{ route('register') }}">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
