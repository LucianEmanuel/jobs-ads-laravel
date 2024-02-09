@extends('admin.body.dashboard')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> All companies
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr class="text-left uppercase font-semibold text-sm">
                                <th class="py-3 px-4 ">Company</th>
                                <th class="py-3 px-4">City</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($companies as $company)
                                <tr class="text-left border-b border-gray-300">
                                    <td class=" py-3 px-4">
                                        <div class="flex items-center text-sm">
                                                <p class="font-semibold">{{ $company->name }}</p>
                                        </div>
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $company->city }}
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $company->email }}
                                    </td>

                                    <td class="py-3 px-4">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full  {{$company->is_banned ? "text-red-700 bg-red-200" : "text-green-700 bg-green-200" }} ">
                                            {{ $company->status}}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">

                                        <a href="{{route('block.user', $company->id)}}"
                                            class="font-medium  hover:underline {{ $company->is_banned ? 'text-green-600' : 'text-red-600' }}">{{ $company->status == 'active' ? "Disable" : "Enable" }}</a>
                                        <a href="{{route('delete.user', $company->id)}}" class="font-medium text-red-200 bg-red-700 p-1 rounded-full ml-8 hover:bg-red-600" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="my-8">
                    {{ $companies->links() }}
                </div>
            </div>

        </main>
    </div>
@endsection
