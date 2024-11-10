@extends('website.layouts.app')
@section('title', 'Account')
@section('content')

        <main class="flex-grow flex items-center justify-center pt-36 pb-20 bg-white">
            <!-- Single Content Section -->
            <section class="bg-white border border-gray-400 p-8 rounded-lg shadow-md max-w-md w-full text-center">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Account Information</h2>
                <p class="text-lg mb-4">Hello, <strong>{{ $user->name }}</strong>!</p>
                <p class="text-md mb-4 text-gray-600"><strong>Account name: </strong>{{ $user->name }}</p>
                <p class="text-md mb-4 text-gray-600"><i class="fas fa-home text-gray-500 mr-2"></i><strong>Address: </strong>{{ $user->address }}</p>
                <p class="text-md mb-4 text-gray-600"><i class="fas fa-phone-alt text-gray-500 mr-2"></i><strong>Phone number: </strong>{{ $user->phone }}</p>
                <a href="{{ route('logout') }}" class="text-md font-semibold text-blue-600 underline mt-4 inline-block"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Log out</a>
            </section>
        </main>

@endsection
