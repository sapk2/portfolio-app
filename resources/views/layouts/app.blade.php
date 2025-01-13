<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" />
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

   <!-- SweetAlert2 CDN -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="//unpkg.com/alpinejs" defer></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
<div class="flex">

<!-- Sidebar -->
<div id="sidebar" class="w-56 bg-red-900 text-white h-screen fixed transform -translate-x-full transition-transform duration-300 ease-in-out">
<div class="p-4 flex justify-between items-center">
<img src="{{asset('/img/profile.jpg')}}" alt="User Avatar" class="w-16 h-16 rounded-full">
<h2 class="text-lg font-bold">{{ $user->name ?? 'Guest' }}</h2>
<button id="closeSidebar" class="text-white focus:outline-none">✖</button>
</div>
<ul class="mt-4">
<li>
<a href="{{route('users.dashboard')}}" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl ">Dashboard</a>
</li>
<li>
<a href="{{route('users.resumes.index')}}" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">Resume</a>
</li>
<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">Project</a>
</li>
<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">Image</a>
</li>
<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">Skills</a>
</li>
<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">About</a>
</li>
<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">contact</a>
</li>

<li>
<a href="" class="block hover:bg-red-200 p-4 rounded-lg font-bold text-xl">Users</a>
</li>
<li>
<form action="{{ route('logout') }}" method="POST" class="block py-2 px-4 hover:bg-red-700 rounded">
@csrf
<button type="submit" class="w-full text-left">Logout</button>
</form>
</li>
</ul>
</div>

<!-- Main Content -->
<div class="flex-1">
<!-- Top Navigation -->
<div class="bg-red-900 text-white p-4 flex justify-between items-center">
<button id="toggleButton" class="text-white focus:outline-none">
☰
</button>
</div>
<div class="p-4 text-white">

</div>
</div>
</div>

<script>
const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleButton');
const closeSidebar = document.getElementById('closeSidebar');

// Open sidebar
toggleButton.addEventListener('click', () => {
sidebar.classList.remove('-translate-x-full');
});

// Close sidebar
closeSidebar.addEventListener('click', () => {
sidebar.classList.add('-translate-x-full');
});
</script>
<div class="p-4 flex-1">
@yield('content')
</div>
</div>
</body>
</html>