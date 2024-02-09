@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <div class="bg-white p-10 rounded-md max-w-2xl mx-auto my-12 shadow-lg">
            <div class="text-center my-8 ">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create Post
                </h2>
            </div>
            <form action="{{route('store.post')}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Job Title')" />
                    <x-text-input id="title" type="text" name="title" :value="old('title')" required autofocus
                         />
                    <x-input-error :messages="$errors->get('title')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="city" :value="__('Job Location')" />
                    <x-text-input id="city" type="text" name="city" :value="old('city')" required autofocus
                         />
                    <x-input-error :messages="$errors->get('city')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="tags" :value="__('Tags')" />
                    <x-text-input id="tags" type="text" name="tags" :value="old('tags')" required autofocus
                         />
                    <x-input-error :messages="$errors->get('tags')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="description" :value="__('Job Description')" />
                    <textarea class="border border-gray-300 rounded p-2 w-full" name="description" id="description" rows="10"></textarea>
                     <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="inline-block px-4 py-1 mr-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Create
                        Post</button>
                    <a href="{{route('index')}}"
                        class="inline-block px-4 py-1 border border-gray-700 text-gray-700 rounded-md hover:text-white hover:bg-gray-700 transition">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
