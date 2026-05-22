<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu Login</title>

    <link rel="stylesheet" href="/build/assets/app-EsFTbYNn.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-5xl bg-white rounded-[40px] shadow-2xl overflow-hidden grid md:grid-cols-2">

        <!-- LEFT SIDE -->
        <div class="hidden md:flex flex-col justify-center items-center bg-blue-600 text-white p-12 relative overflow-hidden">

            <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full opacity-20 -translate-x-20 -translate-y-20"></div>

            <div class="absolute bottom-0 right-0 w-80 h-80 bg-blue-300 rounded-full opacity-20 translate-x-20 translate-y-20"></div>

            <div class="relative z-10 text-center">

                <div class="w-28 h-28 mx-auto bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-6xl shadow-lg mb-8">
                    🎓
                </div>

                <h1 class="text-5xl font-extrabold mb-6">
                    TaskKu
                </h1>

                <p class="text-lg leading-relaxed text-blue-100 max-w-sm">
                    Organize your academic life easily,
                    upload assignments, manage tasks,
                    and stay productive every day.
                </p>

                <div class="mt-10 flex justify-center gap-4">

                    <div class="bg-white/20 px-5 py-3 rounded-2xl backdrop-blur-md">
                        📚 Study
                    </div>

                    <div class="bg-white/20 px-5 py-3 rounded-2xl backdrop-blur-md">
                        ✅ Tasks
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="p-8 md:p-12 flex flex-col justify-center">

            <!-- ERROR -->
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">

                    <ul class="list-disc ml-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <!-- MOBILE LOGO -->
            <div class="md:hidden flex justify-center mb-6">

                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center text-4xl shadow">
                    🎓
                </div>

            </div>

            <!-- TITLE -->
            <h2 class="text-4xl font-bold text-gray-800 mb-2">
                Welcome Back 👋
            </h2>

            <p class="text-gray-500 mb-8">
                Login to continue your productivity journey with TaskKu.
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- EMAIL -->
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Gmail
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="Enter your gmail"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >

                </div>

                <!-- PASSWORD -->
                <div>

                    <div class="flex justify-between items-center mb-2">

                        <label class="text-sm font-semibold text-gray-700">
                            Password
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-600 hover:underline font-medium">
                                Forgot Password?
                            </a>
                        @endif

                    </div>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >

                </div>

                <!-- REMEMBER -->
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-2 text-sm text-gray-600">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >

                        Remember me

                    </label>

                    <span class="text-sm text-gray-400">
                        Secure Login
                    </span>

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-semibold text-lg shadow-lg transition duration-300"
                >
                    Login Now
                </button>

                <!-- REGISTER -->
                <div class="text-center text-gray-600 pt-2">

                    Don’t have an account?

                    <a href="{{ route('register') }}"
                       class="text-blue-600 font-semibold hover:underline">
                        Register
                    </a>

                </div>

            </form>

            <!-- FOOTER -->
            <div class="flex justify-center gap-6 text-sm text-gray-400 mt-10">

                <span class="hover:text-blue-500 cursor-pointer transition">
                    Panduan
                </span>

                <span class="hover:text-blue-500 cursor-pointer transition">
                    Privasi
                </span>

                <span class="hover:text-blue-500 cursor-pointer transition">
                    Bantuan
                </span>

            </div>

        </div>

    </div>

</body>
</html>