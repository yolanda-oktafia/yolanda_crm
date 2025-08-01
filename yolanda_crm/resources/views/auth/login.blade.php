<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel CRM') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Config -->
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
                        light: '#FDF2F8', 
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-light font-sans antialiased">
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-2xl shadow-lg">
            <!-- Header -->
            <div>
                <h1 class="text-3xl font-bold text-center text-primary-dark">
                    Yolanda CRM
                </h1>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Silakan login untuk melanjutkan
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                    <p class="font-bold">Oops!</p>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full px-4 py-2 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-2 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="w-full px-4 py-2.5 font-semibold text-white bg-primary-dark rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-dark transition">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
