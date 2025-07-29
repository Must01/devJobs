<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevJobs - Find Your Next Tech Position</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-900 text-gray-100 font-sans antialiased">
    <nav class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
                <div class="flex items-center space-x-2">
                    <!-- Simple Logo -->
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <a href="/" class="text-xl font-bold text-white">
                        DevJobs
                    </a>
                </div>

                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->is('/') ? 'text-white' : '' }}">
                        Jobs
                    </a>
                    <a href="/companies" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->is('companies*') ? 'text-white' : '' }}">
                        Companies
                    </a>
                    <a href="/salary-guide" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->is('salary-guide') ? 'text-white' : '' }}">
                        Salaries
                    </a>
                    <a href="/blog" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors {{ request()->is('blog*') ? 'text-white' : '' }}">
                        Blog
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    @guest
                        <a href="/login" class="text-gray-300 hover:text-white px-3 py-2 text-sm transition-colors">Login</a>
                        <a href="/register" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            Sign Up
                        </a>
                    @endguest

                    @auth
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-300 hover:text-white px-3 py-2 rounded-lg transition-colors">
                                <span class="text-sm">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                @if(auth()->user()->employer)
                                    <a href="/dashboard" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors">Dashboard</a>
                                    <a href="/jobs/create" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors">Post Job</a>
                                    <div class="border-t border-gray-700"></div>
                                @endif
                                <form method="POST" action="/logout">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    <!-- Mobile menu button -->
                    <button class="md:hidden text-gray-300 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-900/30 border border-green-700 rounded-lg text-green-300">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-900/30 border border-red-700 rounded-lg text-red-300">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

    <footer class="bg-gray-800 border-t border-gray-700 mt-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-blue-600 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-semibold text-white">DevJobs</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Find your next tech opportunity with top companies.
                    </p>
                </div>
                <div>
                    <h4 class="font-medium text-white mb-4">Job Seekers</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/" class="hover:text-white transition-colors">Browse Jobs</a></li>
                        <li><a href="/companies" class="hover:text-white transition-colors">Companies</a></li>
                        <li><a href="/salary-guide" class="hover:text-white transition-colors">Salary Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium text-white mb-4">Employers</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/register" class="hover:text-white transition-colors">Post Jobs</a></li>
                        <li><a href="/dashboard" class="hover:text-white transition-colors">Dashboard</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium text-white mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/contact" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="/privacy" class="hover:text-white transition-colors">Privacy</a></li>
                        <li><a href="/terms" class="hover:text-white transition-colors">Terms</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} DevJobs. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
