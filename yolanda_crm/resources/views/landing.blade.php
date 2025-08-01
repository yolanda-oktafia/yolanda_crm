<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Yolanda CRM</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#fef8f5]">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-3xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            <div class="hidden md:block bg-gradient-to-tr from-orange-300 to-pink-400 p-8">
                <img src="{{ asset('images/login-art.jpeg') }}" alt="Login Art" class="w-full h-full object-cover rounded-2xl">
                <div class="text-white text-xs mt-4">
                image source by Pinterest
                </div>
            </div>

            <div class="p-8 flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-2">Welcome to CRM by Yolan</h2>
                <p class="text-sm text-gray-500 mb-6">Enter your email and password</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <div class="text-right mt-1">
                            <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:underline">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-2 bg-orange-400 text-white rounded-md font-semibold hover:bg-orange-500 transition">
                        Sign In
                    </button>

                    <div class="my-4 text-center text-sm text-gray-500">or</div>

                    <button type="button" class="w-full py-2 border border-gray-300 flex items-center justify-center gap-2 rounded-md hover:bg-gray-100">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                        Sign In with Google
                    </button>
                </form>

                <p class="text-sm mt-6 text-center">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
