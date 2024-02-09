@extends('layouts.app')

@section('content')
    <div class="bg-white p-10 rounded-md max-w-2xl mx-auto my-12 shadow-lg">
        <div class="text-center my-8 ">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Your Profile
            </h2>
        </div>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <x-input-label for="name" :value="__('Full Name')" />
                <x-text-input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div class="mb-4">
                <x-input-label for="photo" :value="__('Profile Photo')" />
                <x-text-input id="image" type="file" name="photo" value="{{ old('photo', $user->photo) }}" required
                    autofocus />
                <x-input-error :messages="$errors->get('photo')" />
            </div>
            <div class="py-8 border border-gray-200 grid place-content-center">
                <img src="{{ !empty(Auth::user()->photo) ? asset('frontend/assets/images/upload/' . Auth::user()->photo) : asset('frontend/assets/images/avatar-5.png') }}"
                    alt="Logo" width="80px" id="showImage" />
            </div>
            <div class="pt-4 flex items-center justify-between">
                <div>
                    <button type="submit"
                        class="inline-block px-4 py-1 mr-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Update
                        Profile</button>
                    <a onclick="window.history.back()"
                        class="inline-block px-4 py-1 border border-gray-700 text-gray-700 rounded-md hover:text-white hover:bg-gray-700 transition cursor-pointer">Back</a>
                </div>
                <a href="{{ route('profile.delete') }}"
                    class="inline-block justify-self-end px-4 py-1 border border-red-600 text-gray-700 rounded-md  hover:bg-red-600 hover:text-white transition cursor-pointer" id="delete">Delete
                    Account</a>
            </div>
        </form>
    </div>
@endsection
