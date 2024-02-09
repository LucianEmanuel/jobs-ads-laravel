<header class="header bg-white">
    <div class="header-wrapper flex justify-between items-center w-11/12 max-w-screen-xl mx-auto p-4 ">
        <x-app-logo />
        @auth
            @if (!Auth::user()->email_verified_at)
                <span class="inline-block bg-red-600 p-3 text-white font-semibold rounded-md">Please confirm you email
                    address</span>
            @endif
        @endauth
        <div x-data="{ open: false }" x-on:click.outside="open = false" class="account-info">
            @guest
                <div class="">
                    <a href="{{ route('option.register') }}"
                        class=" inline-block px-4 py-1 mr-4 bg-gray-700 text-white rounded-md border border-gray-700 hover:text-gray-700 hover:bg-white  transition">Sign
                        up</a>
                    <a href="{{ route('login') }}"
                        class="inline-block px-4 py-1 border border-gray-700 text-gray-700 rounded-md hover:text-white hover:bg-gray-700 transition">Sign
                        in</a>
                </div>
            @endguest

            @auth

                <div x-on:click="open = ! open" class=" auth relative flex gap-4 items-center cursor-pointer">
                    <p class="text-lg font-semibold">Welcome {{ Auth::user()->name }}</p>
                    @if (Auth::user()->role === 'company')
                        <img src="{{ !empty(Auth::user()->photo) ? asset('frontend/assets/images/upload/' . Auth::user()->photo) : asset('frontend/assets/images/company-logo.svg') }}"
                            alt="Logo" width="40px" />
                    @elseif(Auth::user()->role === 'user' || Auth::user()->role === 'admin')
                        <img src="{{ !empty(Auth::user()->photo) ? asset('frontend/assets/images/upload/' . Auth::user()->photo) : asset('frontend/assets/images/avatar-5.png') }}"
                            alt="Logo" width="40px" />
                    @endif


                    <div x-show="open"
                        class="dropdown absolute top-16 right-0 bg-white w-48 border border-black transition rounded-md">
                        @if (Auth::user()->role === 'user')
                            <a href="{{ route('profile.user.edit') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md">
                                <i class="fa-regular fa-address-card"></i>
                                <span class="ml-2">Profile</span>
                            </a>
                        @elseif (Auth::user()->role === 'company')
                            {{-- Pentru angajator --}}
                            <a href="{{ route('profile.company.edit') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md"><i
                                    class="fa-regular fa-address-card"></i><span class="ml-2">Profile</span> </a>
                            <a href="{{ route('view.company.posts') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100"><i
                                    class="fa-regular fa-rectangle-list"></i><span class="ml-2">Your Posts</span>
                            </a>
                            <a href="{{ route('create.post') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100"><i
                                    class="fa-solid fa-scroll"></i><span class="ml-2">Post a Job</span> </a>
                        @elseif (Auth::user()->role === 'admin')
                            <a href="{{ route('profile.user.edit') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md">
                                <i class="fa-regular fa-address-card"></i>
                                <span class="ml-2">Profile</span>
                            </a>
                            <a href="{{ route('admin.dashboard') }}"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md"><i
                                    class="fa-solid fa-chart-line"></i><span class="ml-2">Dashboard</span> </a>
                        @endif

                        {{-- Pentru toti --}}
                        <a href="{{ route('password.change') }}"
                            class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md">
                            <i class="fa-solid fa-key"></i>
                            <span class="ml-2">Change Password</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block  p-4 border border-slate-100 hover:bg-gray-100 rounded-md"><i
                                    class="fa-solid fa-arrow-right-from-bracket"></i> <span class="ml-2">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
