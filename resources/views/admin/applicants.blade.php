@extends('admin.body.dashboard')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> All Applicants
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr class="text-left uppercase font-semibold text-sm">
                                <th class="py-3 px-4 ">User</th>
                                <th class="py-3 px-4">City</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($applicants as $applicant)
                                <tr class="text-left border-b border-gray-300">
                                    <td class=" py-3 px-4">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full "
                                                    src="{{ !empty($applicant->photo) ? asset('frontend/assets/images/upload/' . $applicant->photo) : asset('frontend/assets/images/avatar-5.png') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $applicant->name }}</p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $applicant->city }}
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $applicant->email }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full  {{$applicant->is_banned ? "text-red-700 bg-red-200" : "text-green-700 bg-green-200" }} ">
                                            {{ $applicant->status}}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">

                                        <a href="{{route('block.user', $applicant->id)}}"
                                            class="font-medium  hover:underline {{ $applicant->is_banned ? 'text-green-600' : 'text-red-600' }}">{{ $applicant->status == 'active' ? "Disable" : "Enable" }}</a>
                                        <a href="{{route('delete.user', $applicant->id)}}" class="font-medium text-red-200 bg-red-700 p-1 rounded-full ml-8 hover:bg-red-600" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="my-8">
                    {{ $applicants->links() }}
                </div>
            </div>

        </main>
    </div>
@endsection
