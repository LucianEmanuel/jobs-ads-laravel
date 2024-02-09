 <aside class="relative bg-gray-800 h-screen w-64 hidden sm:block shadow-xl">
     <div class="p-6">
         <x-app-logo class="w-min"/>

     </div>
     <nav class="text-white text-base font-semibold pt-3">
         <a href="{{route('admin.dashboard')}}" class="flex items-center {{Route::current()->uri() == 'dashboard' ? 'active-nav-link' : ''}}  text-white py-4 pl-6 nav-item">
             <i class="fa-solid fa-chart-line mr-3"></i>
             Dashboard
         </a>
         <a href="{{route('all.posts')}}" class="{{Route::current()->uri() == 'dashboard/posts' ? 'active-nav-link' : ''}}  flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
             <i class="fas fa-sticky-note mr-3"></i>
             Posts
         </a>
         <a href="{{route('all.applicants')}}" class="{{Route::current()->uri() == 'dashboard/applicants' ? 'active-nav-link' : ''}} flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
             <i class="fa-solid fa-users-viewfinder mr-3"></i>
             Applicants
         </a>
         <a href="{{route('all.companies')}}" class="{{Route::current()->uri() == 'dashboard/companies' ? 'active-nav-link' : ''}} flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
             <i class="fa-regular fa-building mr-3"></i>
             Company
         </a>

     </nav>

 </aside>
