@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex">
        <!-- Left Side: Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-white p-10">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Sign In</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                            required autocomplete="current-password">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side: Image, Logo, and Slogan -->
        <div class="hidden md:flex w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('bg.png') }}');">
            <div class="flex flex-col items-center justify-center w-full h-full bg-white bg-opacity-40">
                <img src="{{ asset('logo.png') }}" alt="Logo" style="width: 50% ; object-fit:cover">        </div>
        </div>
    </div>
@endsection
