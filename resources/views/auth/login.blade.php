<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-[35px] shadow-2xl p-8">

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">

                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <!-- Logo -->
        <div class="flex justify-center mb-5">

            <div class="bg-blue-100 p-5 rounded-full">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-blue-600"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 14l9-5-9-5-9 5 9 5z"/>

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z"/>
                </svg>

            </div>

        </div>

        <!-- Title -->
        <h1 class="text-5xl font-bold text-center text-gray-800">
            TaskKu
        </h1>

        <p class="text-center text-gray-500 mt-3 mb-10">
            Welcome back to your Academic Zen.
        </p>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-6">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gmail
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-full border border-gray-300 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            <!-- Password -->
            <div class="mb-4">

                <div class="flex justify-between mb-2">

                    <label class="text-sm font-semibold text-gray-700">
                        Password
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-600 font-semibold hover:underline">
                            Forgot?
                        </a>
                    @endif

                </div>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-full border border-gray-300 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            <!-- Remember -->
            <div class="flex items-center mb-6">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                >

                <span class="ml-2 text-sm text-gray-600">
                    Remember me
                </span>

            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-blue-700 hover:bg-blue-800 text-white py-4 rounded-full text-2xl font-semibold shadow-lg transition duration-300"
            >
                Masuk
            </button>

            <!-- Register -->
            <div class="text-center mt-8 text-gray-600">

                Belum punya akun?

                <a href="{{ route('register') }}"
                   class="text-blue-600 font-semibold hover:underline">
                    Daftar
                </a>

            </div>

        </form>

        <!-- Footer -->
        <div class="flex justify-center gap-6 text-sm text-gray-400 mt-10">
            <span>Panduan</span>
            <span>Privasi</span>
            <span>Bantuan</span>
        </div>

    </div>

</body>
</html>