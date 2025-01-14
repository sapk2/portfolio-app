<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" />

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex relative">
        <!-- Sidebar -->
        <nav id="sidebar" class="w-56 bg-red-900 text-white h-screen fixed transform -translate-x-full transition-transform duration-300 ease-in-out z-30">
            <div class="p-4 flex justify-between items-center">
                <img src="{{ asset('/img/profile.jpg') }}" alt="User Avatar" class="w-16 h-16 rounded-full">
                <h2 class="text-lg font-bold">{{ $user->name ?? 'Guest' }}</h2>
                <button id="closeSidebar" class="text-white focus:outline-none">✖</button>
            </div>
            <ul class="mt-4 space-y-2">
                <li><a href="{{ route('users.dashboard') }}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Dashboard</a></li>
                <li><a href="{{ route('users.resumes.index') }}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Resume</a></li>
                <li><a href="{{ route('users.projects.index') }}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Project</a></li>
                <li><a href="{{route('users.image-gallery')}}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Image</a></li>
                <li><a href="{{route('users.skills.index')}}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Skills</a></li>
                <li><a href="#" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">About</a></li>
                <li><a href="#" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Contact</a></li>
                <li><a href="{{route('users.manageusers.index')}}" class="block hover:bg-red-700 p-4 rounded-lg font-bold text-xl">Users</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="block py-2 px-4 hover:bg-red-700 rounded">
                        @csrf
                        <button type="submit" class="w-full text-left">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Overlay for blur -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 z-20"></div>

        <!-- Main Content -->
        <div id="mainContent" class="flex-1 transition-all duration-300">
            <!-- Top Navigation -->
            <header class="bg-red-900 text-white p-4 flex justify-between items-center">
                <button id="toggleButton" class="text-white focus:outline-none">☰</button>
            </header>

            <!-- Page Content -->
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const overlay = document.getElementById('overlay');
        const toggleButton = document.getElementById('toggleButton');
        const closeSidebar = document.getElementById('closeSidebar');

        // Function to open the sidebar
        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            overlay.classList.add('block');
            mainContent.classList.add('blur-sm');
        }

        // Function to close the sidebar
        function closeSidebarFunction() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            overlay.classList.remove('block');
            mainContent.classList.remove('blur-sm');
        }

        // Open the sidebar when the toggle button is clicked
        toggleButton.addEventListener('click', openSidebar);

        // Close the sidebar when the close button is clicked
        closeSidebar.addEventListener('click', closeSidebarFunction);

        // Close the sidebar when clicking outside the sidebar
        overlay.addEventListener('click', closeSidebarFunction);
    </script>
</body>

</html>
