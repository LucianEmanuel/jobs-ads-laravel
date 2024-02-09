@extends('layouts.app')

@section('content')
    <div class="w-11/12 max-w-screen-2xl text-center mx-auto py-12">
        <h3 class="text-3xl font-bold">Create New Account</h3>
        <p class="mb-8">Choose the right account type</p>
        <div class="w-2/4 mx-auto grid md:grid-cols-2 p-8 gap-4 ">
            <div class="grid place-items-center p-8 gap-4 shadow-md bg-white rounded-md">
                <img src="{{asset('frontend/assets/images/user.svg')}}" width="100px" alt="Candidate">
                <h4 class="text-2xl py-2 font-bold">Candidate Account</h4>
                <ul class="text-left ">
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>10000 Available jobs</li>
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>Verified companies</li>
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>Personalized recommendations</li>
                </ul>
                <a href="{{route('register.user')}} " class="inline-block w-full px-4 py-2 my-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Create Account</a>
            </div>
            <div class="grid place-items-center p-8 gap-4 shadow-md bg-white rounded-md">
                <img src="{{asset('frontend/assets/images/business.svg')}}" width="100px" alt="Candidate">
                <h4 class="text-2xl py-2 font-bold">Company Account</h4>
                <ul class="text-left ">
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>First free announcement</li>
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>Customer care flawless</li>
                    <li><i class="fa-regular fa-circle-check text-green-500 mr-2"></i>Personalized recommendations</li>
                </ul>
                <a href="{{route('register.company')}}" class="inline-block w-full px-4 py-2 my-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Create Account</a>
            </div>

        </div>
    </div>
@endsection
