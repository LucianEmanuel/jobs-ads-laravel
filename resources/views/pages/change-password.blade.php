@extends('layouts.app')

@section('content')
    <div class="bg-white p-10 rounded-md max-w-2xl mx-auto my-12 shadow-lg">
        <div class="text-center my-8 ">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Your Profile
            </h2>
        </div>
        <form action="{{ route('password.update') }}" method="POST" novalidate>
            @csrf
            <div class="mb-4">
                <x-input-label for="old_password" :value="__('Old Password')" />
                <x-text-input id="old_password" type="password" name="old_password" required autofocus />
                <x-input-error :messages="$errors->get('old_password')" />
            </div>
            <div class="mb-4">
                <x-input-label for="new_password" :value="__('New Password')" />
                <x-text-input id="new_password" type="password" name="new_password" required autofocus />
                <x-input-error :messages="$errors->get('new_password')" />
            </div>
            <div class="mb-4">
                <x-input-label for="new_password_confirmation" :value="__('Confirm New Password')" />
                <x-text-input id="new_password_confirmation" type="password" name="new_password_confirmation" required
                    autofocus />
                <x-input-error :messages="$errors->get('new_password')" />
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="inline-block px-4 py-1 mr-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Update
                    Password</button>
                <a onclick="window.history.back()"
                    class="inline-block px-4 py-1 border border-gray-700 text-gray-700 rounded-md hover:text-white hover:bg-gray-700 transition cursor-pointer">Back</a>
            </div>
        </form>
    </div>
@endsection
