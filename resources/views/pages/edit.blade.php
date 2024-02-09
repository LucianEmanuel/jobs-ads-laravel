 @extends('layouts.app')

 @section('content')
     <div class="mx-4">
         <div class="bg-white p-10 rounded-md max-w-2xl mx-auto mt-12 shadow-lg">
             <div class="text-center my-8 ">
                 <h2 class="text-2xl font-bold uppercase mb-1">
                     Edit Post
                 </h2>
             </div>
             <form action="{{route('update.post', $post->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-4">
                    <x-input-label for="title" :value="__('Job Title')"  />
                    <x-text-input id="title" type="text" name="title" value="{{old('title', $post->title)}}" required autofocus
                        />
                    <x-input-error :messages="$errors->get('title')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="tags" :value="__('Tags')" />
                    <x-text-input id="tags" type="email" name="tags" value="{{old('tags', $post->tags)}}" required autofocus/>
                    <x-input-error :messages="$errors->get('tags')" />
                </div>
                <div class="mb-4">
                    <x-input-label for="description" :value="__('Job Description')" />
                    <textarea class="border border-gray-300 rounded p-2 w-full" name="description" id="description" rows="10">{{old('description', $post->description)}}</textarea>
                     <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="inline-block px-4 py-1 mr-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Update
                        Post</button>
                    <a onclick="window.history.back()"
                        class="inline-block px-4 py-1 border border-gray-700 text-gray-700 rounded-md hover:text-white hover:bg-gray-700 transition cursor-pointer">Back</a>
                </div>
            </form>
         </div>
     </div>
 @endsection
