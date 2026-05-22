<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-slate-950 flex items-center justify-center relative px-6 py-10">

    <!-- BACKGROUND -->
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-500 opacity-20 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-600 opacity-20 rounded-full blur-3xl"></div>

    <!-- CARD -->
    <div class="relative z-10 w-full max-w-7xl bg-white/10 backdrop-blur-2xl border border-white/20 rounded-[40px] overflow-hidden shadow-[0_20px_80px_rgba(0,0,0,0.5)] grid lg:grid-cols-2">

        <!-- LEFT -->
        <div class="hidden lg:flex flex-col justify-center items-center p-20 text-white relative overflow-hidden">

            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-cyan-500/10"></div>

            <div class="relative z-10 text-center">

                <!-- LOGO -->
                <div class="w-40 h-40 rounded-full bg-white/10 border border-white/20 backdrop-blur-xl flex items-center justify-center text-8xl mx-auto shadow-2xl mb-10 animate-pulse">
                    🎓
                </div>

                <!-- TITLE -->
                <h1 class="text-7xl font-black tracking-widest mb-8">
                    TaskKu
                </h1>

                <!-- DESC -->
                <p class="text-xl text-blue-100 leading-10 max-w-xl mx-auto">
                    Organize your academic life,
                    manage assignments,
                    boost productivity,
                    and achieve your goals
                    with a smarter study system.
                </p>

                <!-- FEATURES -->
                <div class="grid grid-cols-2 gap-6 mt-16">

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-xl shadow-xl hover:scale-105 transition duration-300">

                        <div class="text-5xl mb-4">
                            📚
                        </div>

                        <h3 class="text-2xl font-bold mb-2">
                            Smart Study
                        </h3>

                        <p class="text-blue-100 text-sm leading-7">
                            Manage learning materials and schedules easily.
                        </p>

                    </div>

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-6 backdrop-blur-xl shadow-xl hover:scale-105 transition duration-300">

                        <div class="text-5xl mb-4">
                            ✅
                        </div>

                        <h3 class="text-2xl font-bold mb-2">
                            Tasks
                        </h3>

                        <p class="text-blue-100 text-sm leading-7">
                            Organize assignments and deadlines efficiently.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="bg-white p-10 lg:p-16 flex flex-col justify-center relative">

            <!-- MOBILE -->
            <div class="lg:hidden flex justify-center mb-10">

                <div class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center text-6xl shadow-xl">
                    🎓
                </div>

            </div>

            <!-- ERROR -->
            @if ($errors->any())

                <div class="mb-8 bg-red-100 border border-red-300 text-red-700 px-6 py-5 rounded-3xl shadow-lg">

                    <ul class="space-y-2 list-disc ml-5">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- TITLE -->
            <h2 class="text-5xl font-black text-gray-800 leading-tight">
                Welcome Back 👋
            </h2>

            <p class="text-gray-500 text-lg mt-4 mb-12 leading-8">
                Login to continue your productivity journey with TaskKu.
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-8">

                @csrf

                <!-- EMAIL -->
                <div>

                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        Gmail Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="Enter your gmail"
                        class="w-full rounded-3xl border border-gray-300 bg-gray-50 px-6 py-5 text-gray-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-300"
                    >

                </div>

                <!-- PASSWORD -->
                <div>

                    <div class="flex items-center justify-between mb-3">

                        <label class="text-sm font-bold text-gray-700">
                            Password
                        </label>

                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-600 hover:text-blue-800 hover:underline font-semibold">
                                Forgot Password?
                            </a>

                        @endif

                    </div>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full rounded-3xl border border-gray-300 bg-gray-50 px-6 py-5 text-gray-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-300"
                    >

                </div>

                <!-- OPTION -->
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-3 text-gray-600 text-sm">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >

                        Remember me

                    </label>

                    <span class="text-green-600 text-sm font-semibold">
                        🔒 Secure Login
                    </span>

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full py-5 rounded-3xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 text-white text-xl font-black shadow-2xl transition duration-300 hover:scale-[1.02]"
                >
                    Login Now
                </button>

                <!-- REGISTER -->
                <div class="text-center text-gray-600 pt-2 text-lg">

                    Don’t have an account?

                    <a href="{{ route('register') }}"
                       class="text-blue-600 font-bold hover:underline">
                        Register
                    </a>

                </div>

            </form>

            <!-- FOOTER -->
            <div class="flex justify-center gap-8 mt-14 text-sm text-gray-400">

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