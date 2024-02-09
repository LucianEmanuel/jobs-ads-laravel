@extends('layouts.app')

@section('content')



<div class="overflow-x-auto mt-8">
    <table class="w-11/12 max-w-screen-2xl mx-auto text-sm text-left rtl:text-right text-gray-500  ">
        <thead class="text-xs text-gray-100 uppercase bg-gray-800 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Job Title
                </th>
                <th scope="col" class="px-6 py-3">
                   Job Tags
                </th>

                <th scope="col" class="px-6 py-3">
                    Job Description
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($posts as $post)

             <tr class="odd:bg-white  even:bg-gray-100  border-b ">
                 <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     {{$post->title}}
                 </th>
                 <td class="px-6 py-4">
                     {{$post->tags}}
                 </td>
                 <td class="px-6 py-4">
                     {{Str::words($post->description, 15, '...')}}
                 </td>

                 <td class="px-6 py-4">
                     <a href="{{ route('edit.company.post', $post->id)}}" class="font-medium text-blue-600  hover:underline">Edit</a>
                     <a href="{{route('delete.post', $post->id)}}" class="font-medium text-red-600 ml-4 hover:underline" id="delete">Delete</a>
                 </td>
             </tr>

             @endforeach

        </tbody>
    </table>
</div>



@endsection
