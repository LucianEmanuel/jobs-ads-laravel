@extends('admin.body.dashboard')

@section('content')
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Dashboard</h1>

            <div class="w-full mt-12">
                <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs  ">
                        <div class="p-3 mr-4 text-orange-100 bg-orange-500 rounded-full  ">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-gray-200">
                                Total clients
                            </p>
                            <p class="text-2xl font-semibold text-gray-100">
                                {{ $company->count() + $applicants->count() }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs  ">
                        <div class="p-3 mr-4 text-green-100 bg-green-500 rounded-full  ">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-gray-200">
                                Employers
                            </p>
                            <p class="text-2xl font-semibold text-gray-100">
                                {{ $company->count() }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs  ">
                        <div class="p-3 mr-4 text-blue-100 bg-blue-500 rounded-full  ">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-gray-200">
                                Applicants
                            </p>
                            <p class="text-2xl font-semibold text-gray-100">
                                {{ $applicants->count() }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-gray-800 rounded-lg shadow-xs  ">
                        <div class="p-3 mr-4 text-red-100 bg-red-500 rounded-full ">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-medium text-gray-200">
                                Total Jobs
                            </p>
                            <p class="text-2xl font-semibold text-gray-100">
                                {{ $jobs->count() }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> All Users
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr class="text-left uppercase font-semibold text-sm">
                                <th class="py-3 px-4 ">User</th>
                                <th class="py-3 px-4">Role</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($users as $user)
                                <tr class="text-left border-b border-gray-300">
                                    <td class=" py-3 px-4">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full "
                                                    src="{{ !empty($user->photo) ? asset('frontend/assets/images/upload/' . $user->photo) : asset('frontend/assets/images/avatar-5.png') }}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $user->name }}</p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $user->role }}
                                    </td>
                                    <td class=" py-3 px-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight {{ $user->is_banned ? 'text-red-700 bg-red-200' : 'text-green-700 bg-green-200' }}   rounded-full ">
                                            {{ $user->status }}
                                        </span>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="my-8">
                    {{ $users->links() }}
                </div>
            </div>
        </main>
        <footer class="w-full bg-white text-center p-4">
            <p>Copyright &copy {{ now()->year }}, All Rights reserved </p>
        </footer>
    </div>
@endsection
