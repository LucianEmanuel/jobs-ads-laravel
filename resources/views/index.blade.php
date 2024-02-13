@extends('layouts.app')

@section('content')
    <section class="hero h-[300px] grid place-content-center md:h-[500px]"
        style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)), url({{ asset('frontend/assets/images/hero.jpg') }} ) no-repeat top center/cover">
        <div class="text w-11/12 max-w-xl mx-auto md:max-w-5xl ">
            <h1 class="text-5xl text-white md:text-8xl font-bold">Where Your Professional Future Begins!</h1>
        </div>
    </section>
    <section class="search bg-gray-200 py-16">
        <div class="search-wrapper w-11/12 max-w-screen-xl mx-auto grid gap-4">
            <h2 class="text-gray-900 text-3xl md:text-5xl font-semibold">Find your job</h2>
            <form action="/" class="bg-white rounded-md w-full flex py-2 md:py-4">
                <input type="search" name="search" id="search" placeholder="Search..."
                    class="w-full border-none focus:ring-0 focus:bg-white px-8 py-3 text-xl decoration-transparent">
                <button type="submit"
                    class="mx-3 px-4  text-white bg-gray-700 border border-gray-700 rounded-md hover:bg-white hover:text-gray-700 transition">
                    <i class="fa-solid fa-magnifying-glass "></i>
                </button>
            </form>
        </div>
    </section>
    <section class="jobs bg-gray-100">
        <div
            class="jobs-cards w-11/12 max-w-screen-xl mx-auto grid gap-4 place-content-center  py-12 lg:grid-cols-2 xl:grid-cols-3 ">

            @unless (count($posts) == 0)
                @foreach ($posts as $post)
                    <div x-data="{ favorite: false }"
                        class="card flex flex-col justify-between  p-8 gap-4 shadow-md bg-white rounded-md w-full h-full">
                        <div class="company-logo flex items-center justify-center">
                            <img src="{{ asset('frontend/assets/images/company-logo.svg') }}" width="80px" alt="">
                        </div>
                        <div class="card-text text-center ">
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $post->title }}</h3>
                            <h4 class="text-xl mt-2"> {{$post->user->name}}</h4>

                            <x-posts-tags :tagsComp='$post->tags' />
                        </div>

                        <div>
                            <div class="tags flex justify-between gap-4 items-center mt-4">
                                <div class="location">
                                    <p>Location</p>
                                    <a href="#">{{ $post->city }}</a>
                                </div>

                            </div>
                            <a href="{{ route('show.post', $post->id) }}"
                                class="block mt-8 w-full bg-gray-700 text-white text-center py-3 rounded-md">View Details</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-xl font-semibold">No posts found</p>
            @endunless
        </div>
        <div class="pb-4 w-11/12 max-w-screen-xl mx-auto">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
