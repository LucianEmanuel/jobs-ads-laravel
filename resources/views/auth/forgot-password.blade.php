@extends('layouts.app')

@section('content')
    <div
        class="f-full flex flex-col items-center justify-center gap-8 my-32 p-12 w-11/12 max-w-lg mx-auto bg-white rounded-md shadow-lg">

        <x-app-logo />

        <p class="text-lg font-semibold text-justify">Forgot your password? No problem. Just let us know your email address and we will
            email you a password reset link that will allow you to choose a new one</p>
        <form method="POST" action="{{ route('password.email') }}" class="w-full grid gap-4" novalidate>
            @csrf
            <div class="grid gap-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <button type="submit" class="bg-green-600 text-white rounded py-2 px-8 hover:bg-black">
                Email Password Reset Link
            </button>
    </div>
@endsection
