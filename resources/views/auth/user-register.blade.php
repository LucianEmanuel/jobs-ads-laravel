 @extends('layouts.app')

 @section('content')
     <div class="flex flex-col items-center justify-center my-8 p-12 w-11/12 max-w-2xl mx-auto bg-white rounded-md shadow-lg">
         <x-app-logo />
         <h2 class="uppercase text-2xl font-bold mt-8">register</h2>
         <p class="text-lg font-semibold mb-8">Create an account</p>
         <form method="POST" action="{{url('register/user')}}" class="w-full grid gap-4" novalidate>
            @csrf
             <div class="input-group grid gap-3">
                 <x-input-label for="name" :value="__('Name')" />
                 <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                     autocomplete="name" />
                 <x-input-error :messages="$errors->get('name')" />
             </div>
             <div class="input-group grid gap-3">
                 <x-input-label for="email" :value="__('Email')" />
                 <x-text-input id="email" type="email" name="email" :value="old('email')" required
                     autocomplete="email" />
                 <x-input-error :messages="$errors->get('email')" />
             </div>

             <div class="input-group grid gap-3">
                 <x-input-label for="password" :value="__('Password')" />
                 <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                 <x-input-error :messages="$errors->get('password')" />
             </div>
             <div class="input-group grid gap-3">
                 <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                 <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                     autocomplete="new-password" />
                 <x-input-error :messages="$errors->get('password_confirmation')" />
             </div>
             <div class="my-6">
                 <button type="submit" class="bg-green-600 w-full text-white rounded py-2 px-4 hover:bg-black">
                     Sign up
                 </button>
             </div>

             <div class="mt-8">
                 <p>
                     Already have an account?
                     <a href="{{route('login')}}" class="text-green-600">Login</a>
                 </p>
             </div>
         </form>
     </div>
 @endsection
