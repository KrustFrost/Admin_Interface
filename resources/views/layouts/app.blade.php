<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{mix('css/app.css')}}" rel="stylesheet">
<script src="{{ mix('js/app.js')}}"></script>
  <title>Admin/Backend Interface</title>
</head>
<body class="bg-gray-200 overflow-x-hidden">
<div id="header_user"class="w-screen sticky top-0 z-50 flex-shrink-0 px-8 py-4 shadow-lg flex justify-between ">
<a href="/" id="logo_link"><img id="image_logo" src="{{ asset('/storage/A.I_Logo.png') }}"  width="100" class="m-auto "></a>
    <form action="{{route('logout')}}" method="post">
                  @csrf
                  <div class="flex flex-row">
                  @if(auth()->user()->avatar_photo == "empty")
                  <img id="auth_photo" src="{{ asset('storage/QM.png')}}" alt="avatar" width="150"  class="w-10 h-10 mr-3 rounded-full">
                  @else
                  <img id="auth_photo" src="{{ asset('storage/'.auth()->user()->avatar_photo)}}" alt="avatar" width="150"  class="w-10 h-10 mr-3 rounded-full">
                  @endif
                  <p id="auth_username" class="text-white mr-3 break-words">Welcome, {{auth()->user()->name}}</p>
                  <button type="submit" class="m-auto bg-blue-300 rounded-md pl-2 pr-2 shadow-md hover:bg-blue-600">Logout</button>
             </div>
      </form>    
</div>
<div class="md:flex flex-col md:flex-row md:min-h-screen w-full" >
  <div id="nav_sticky" @click.away="open = false" class=" flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 " x-data="{ open: false }">
    <div id="side_nav" class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
      <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav id="side_nav" :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
    <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 text-black focus:outline-none focus:shadow-outline text-shadow-md {{ Request::path() == 'dashboard' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('dashboard')}}">Dashboard</a>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'User_Management_System' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('UMS')}}">Users</a>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'Profile_Management_System' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('PMS')}}" >Profiles</a>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'Library_Management_System' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('LMS')}}" >Library</a>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'Calendar_System' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('CS')}}" >Calendar</a>
      <hr>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'About' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('About')}}">About Us</a>
      <hr>
      <a class="mb-2 block px-4 py-2 mt-2 text-lg font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-black dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline text-shadow-md {{ request()->segment(1) == 'Team' ? 'border-b-4 border-t-4 border-l-4 border-r-4 border-gray-900 bg-gray-300 shadow-lg text-gray-900' : '' }}" href="{{route('Team')}}">Team</a>
      <hr>
        </div>
        @yield('content')
      </div>
    </nav>
  </div>
</div>



</html>