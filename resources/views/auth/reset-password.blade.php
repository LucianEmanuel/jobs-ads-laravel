@extends('layouts.app')

@section('content')
    <div
        class="f-full flex flex-col items-center justify-center gap-8 my-12 p-12 w-11/12 max-w-lg mx-auto bg-white rounded-md shadow-lg">

        <x-app-logo />

        <p class="text-lg font-semibold">Please Type Your New Password</p>
        <form method="POST" action="{{ route('password.store') }}" class="w-full grid gap-4" novalidate>
            @csrf
             <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="grid gap-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div class="input-group grid gap-3">
                 <x-input-label for="password" :value="__('Password')" />
                 <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                 <x-input-error :messages="$errors->get('password')" />
             </div>
             <div class="input-group grid gap-3">
                 <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                 <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                     autocomplete="new-password" />
                 <x-input-error :messages="$errors->get('password_confirmation')" />
             </div>

            <button type="submit" class="bg-green-600 text-white rounded py-2 px-8 hover:bg-black">
                Reset Password
            </button>
    </div>
@endsection
