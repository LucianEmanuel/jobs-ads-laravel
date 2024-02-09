@extends('admin.body.dashboard')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
                All Jobs
            </h2>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> All Posts
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr class="text-left uppercase font-semibold text-sm">
                                <th class="py-3 px-4 ">Company</th>
                                <th class="py-3 px-4">Job Title</th>
                                <th class="py-3 px-4">Job City</th>
                                <th class="py-3 px-4">Job Description</th>
                                <th class="py-3 px-4">Job Tags</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($posts as $post)
                                <tr class="text-left border-b border-gray-300">
                                    <td class=" py-3 px-4">
                                        {{ $post->user->name }}
                                    </td>
                                    <td class=" py-3 px-4">
                                       <a href="{{route("show.post", $post->id)}}" class="hover:text-blue-600 hover:underline">{{ $post->title }}</a>
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $post->city }}
                                    </td>
                                    <td class="py-3 px-4">
                                        {{Str::words($post->description, 8, '...')}}
                                    </td>
                                    <td class="py-3 px-4">
                                        {{ $post->tags }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="my-8">
                    {{ $posts->links() }}
                </div>
            </div>


        </div>
    </main>
@endsection
