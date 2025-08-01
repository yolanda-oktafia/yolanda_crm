<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel CRM') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            light: '#FCE7F3', 
                            DEFAULT: '#F472B6', 
                            dark: '#DB2777', 
                        },
                        secondary: '#A78BFA', 
                        light: '#FDF2F8',
                        muted: '#6B7280', 
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-light font-sans antialiased">
    <div class="flex h-screen bg-gray-100">
        <aside class="w-64 flex-shrink-0 bg-white border-r border-gray-200 flex flex-col">
            <div class="h-16 flex items-center justify-center px-4 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-primary-dark">CRM by Yolanda</h1>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-primary-light hover:text-primary-dark {{ request()->is('dashboard*') ? 'bg-primary-light text-primary-dark font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                    Dashboard
                </a>
                <a href="{{ route('leads.index') }}" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-primary-light hover:text-primary-dark {{ request()->is('leads*') ? 'bg-primary-light text-primary-dark font-semibold' : '' }}">
                   <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    Leads
                </a>
                <a href="{{ route('customers.index') }}" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-primary-light hover:text-primary-dark {{ request()->is('customers*') ? 'bg-primary-light text-primary-dark font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962a3.752 3.752 0 01-4.23-1.032 3.752 3.752 0 01-1.032-4.23A3.75 3.75 0 017.5 4.5c1.55 0 2.958.83 3.75 2.04M11.25 9.75v5.25m0 0l-1.06-1.06m1.06 1.06l1.06-1.06m-7.5 6.375a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>
                    Customers
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-primary-light hover:text-primary-dark {{ request()->is('products*') ? 'bg-primary-light text-primary-dark font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a2.25 2.25 0 01-2.25 2.25H5.25a2.25 2.25 0 01-2.25-2.25v-8.25M12 4.875A2.625 2.625 0 1012 10.125A2.625 2.625 0 0012 4.875zM12 12.75h.008v.008H12v-.008z" /></svg>
                    Products
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-primary-light hover:text-primary-dark {{ request()->is('projects*') ? 'bg-primary-light text-primary-dark font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12z" /></svg>
                    Projects
                </a>
            </nav>
            <div class="px-4 py-4 border-t border-gray-200">
                <a href="#" class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-red-100 hover:text-red-600">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                    Logout
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-end px-6">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
                    <img class="w-8 h-8 rounded-full ml-6 object-cover" src="https://placehold.co/100x100/F472B6/FFFFFF?text=U" alt="User avatar">
                </div>
            </header>
            
            <div class="flex-1 overflow-y-auto p-6 md:p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
