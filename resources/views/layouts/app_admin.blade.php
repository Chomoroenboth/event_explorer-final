<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Explorer - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="admin-container">
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="sidebar-nav w-64 flex flex-col">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-gray-700">
                <h1 class="text-xl font-bold text-white">Admin Panel</h1>
            </div>

            <!-- Navigation -->
            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center px-4 py-3 text-sm font-medium text-white rounded-lg">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5l6-3 6 3"></path>
                    </svg>
                    Dashboard
                </a>

            

                <a href="{{ route('admin.events') }}"
                    class="nav-item {{ request()->routeIs('admin.events') ? 'active' : '' }} flex items-center px-4 py-3 text-sm font-medium text-white rounded-lg">
                    <!-- UPDATED: Using the same calendar icon -->
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                    </svg>
                    Events
                </a>
            </nav>
            <!-- User Menu -->
            @if (auth('admin')->check())
            <div class="px-4 py-4 border-t border-gray-700">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full" src="https://whatsondisneyplus.b-cdn.net/wp-content/uploads/2022/12/spiderman.png" alt="Admin">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Admin</p>
                        <p class="text-xs text-gray-300">{{ auth('admin')->user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full text-left px-2 py-1 text-sm text-gray-300 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
            @endif
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="dashboard-header bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">@yield('page-description', 'Manage your events and users')</p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Mobile menu button -->
                        <button class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto content-wrapper">
                <div class="px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>