@extends('layouts.app')

 @section('content')
            <!-- Search -->

            <a onclick="window.history.back()" class="inline-block ml-4 my-4 text-xl cursor-pointer"><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="w-11/12 max-w-4xl mx-auto shadow-lg rounded-md mb-12">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img class="w-48 mr-6 mb-6" src="{{asset('frontend/assets/images/company-logo.jpg')}}" alt="" />

                        <h3 class="text-2xl mb-2 font-semibold">{{$post->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$post->user->name}}</div>
                        <div class="text-lg mb-4">
                            <i class="fa-solid fa-location-dot"></i> {{$post->user->address}}
                        </div>

                        <x-posts-tags :tagsComp='$post->tags' class="!mt-3"/>


                        <div class="text-justify">
                            <h3 class="text-3xl text-center font-bold my-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$post->description}}
                                </p>


                                <a href="mailto:{{$post->user->email}}" target="_blank"
                                    class="block w-full px-4 py-1 mr-4 bg-gray-700 text-white text-center rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition"><i
                                        class="fa-solid fa-envelope"></i>
                                    Contact Employer</a>

                                <a href="{{$post->user->website}}" target="_blank"
                                    class="block px-4 py-1 border border-gray-700 text-gray-700 text-center rounded-md hover:text-white hover:bg-gray-700 transition"><i
                                        class="fa-solid fa-globe"></i> Visit
                                    Website</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   @endsection
