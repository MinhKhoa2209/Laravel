@extends('website.layouts.app')
@section('title', 'Register')
@section('content')

        <div class="container mx-auto pt-40 pb-24 ">
            <div class="flex justify-center">
                <div class="max-w-md w-full">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-lg">
                        <div class="p-8">
                            <div class="text-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-4">CREATE AN ACCOUNT!</h1>
                            </div>
                            <form action="{{ route('register.save') }}" method="POST" class="space-y-4">
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
                                    <input name="name" type="text" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleName" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="tel" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleInputPhone" placeholder="Phone number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleInputAddress" placeholder="Address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password" class="form-control form-control-user font-semibold w-full p-3 border border-gray-400 rounded" id="exampleRepeatPassword" placeholder="Reenter Password">
                                    </div>
                                </div>
                                <button type="submit" class="bg-black text-white font-bold py-2 rounded w-full">Register </button>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <a class="text-sm text-blue-600 hover:underline" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
