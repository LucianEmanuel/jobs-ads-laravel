@extends('layouts.app')

@section('content')
    <div
        class="f-full flex flex-col items-center justify-center gap-8 my-12 p-12 w-11/12 max-w-lg mx-auto bg-white rounded-md shadow-lg">

        <x-app-logo />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- Login Form -->
        <p class="text-lg font-semibold">Please log in in to your account</p>
        <form method="POST" action="{{ route('login') }}" class="w-full grid gap-4" novalidate>
            @csrf
            <div class="grid gap-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div class="grid gap-3">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" :value="old('password')" required autofocus
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300  text-indigo-600 shadow-sm focus:ring-indigo-500  "name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="my-6 flex items-center justify-between ">
                @if (Route::has('password.request'))
                    <a class="underline text-sm  hover:text-green-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit" class="bg-green-600 text-white rounded py-2 px-8 hover:bg-black">
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="{{ route('option.register') }}" class="text-green-600">Register</a>
                </p>
            </div>
        </form>
    </div>
@endsection
