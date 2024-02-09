<!-- Desktop Header -->
<header class="w-full items-center justify-between bg-white py-2 px-6 hidden sm:flex">
    <div class="flex justify-end flex-1 lg:mr-32">
       {{--  <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
            <form action="/dashboard" class="bg-white rounded-md w-full flex py-2">
                <input type="search" name="search" id="search" placeholder="Search..."
                    class="w-full rounded-l-md border border-gray-200 focus:ring-0 focus:bg-white px-2 py-2 text-xl decoration-transparent">
                <button type="submit"
                    class="px-4  text-white bg-gray-700 border border-gray-700 rounded-r-md hover:bg-white hover:text-gray-700 transition">
                    <i class="fa-solid fa-magnifying-glass "></i>
                </button>
            </form>

        </div> --}}

        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen"
                class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-1 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img class="object-cover w-20 rounded-full"
                    src="{{ !empty(Auth::user()->photo) ? asset('frontend/assets/images/upload/' . Auth::user()->photo) : asset('backend/assets/img/avatar-5.png') }}"
                    alt="" aria-hidden="true" />
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-48 bg-white rounded-lg shadow-lg py-2 mt-[60px]">
                <a href="{{ route('profile.user.edit') }}"
                    class="block px-4 py-2 account-link hover:text-white">Profile</a>
                <a href="{{ route('password.change') }}" class="block px-4 py-2 account-link hover:text-white">Change
                    Password</a>
                <a href="{{ route('admin.logout') }}" class="block px-4 py-2 account-link hover:text-white">Logout</a>
            </div>
        </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-gray-800 py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <x-app-logo />
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
        <a href="{{route('admin.dashboard')}}" class="{{Route::current()->uri() == 'dashboard' ? 'active-nav-link' : ''}} flex items-center  text-white py-2 pl-4 nav-item">
            <i class="fa-solid fa-chart-line mr-3"></i>
            Dashboard
        </a>
        <a href="{{route('all.posts')}}" class="{{Route::current()->uri() == 'dashboard/posts' ? 'active-nav-link' : ''}} flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Posts
        </a>
        <a href="{{route('all.applicants')}}" class="{{Route::current()->uri() == 'dashboard/applicants' ? 'active-nav-link' : ''}} flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fa-solid fa-users-viewfinder mr-3"></i>
            Aplicants
        </a>
        <a href="{{route('all.companies')}}" class="{{Route::current()->uri() == 'dashboard/companies' ? 'active-nav-link' : ''}} flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
             <i class="fa-regular fa-building mr-3"></i>
            Company
        </a>

    </nav>

</header>
