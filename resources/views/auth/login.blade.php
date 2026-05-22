<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu Login</title>

    {{-- CSS BUILD --}}
    <link rel="stylesheet" href="/build/assets/app-CIPofioy.css">
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 flex items-center justify-center px-4 py-10 overflow-hidden">

    {{-- BACKGROUND EFFECT --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-300 opacity-20 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-96 h-96 bg-sky-300 opacity-20 rounded-full blur-3xl"></div>

    {{-- MAIN CARD --}}
    <div class="relative w-full max-w-6xl bg-white/80 backdrop-blur-xl shadow-2xl rounded-[40px] overflow-hidden grid lg:grid-cols-2 border border-white/40">

        {{-- LEFT SECTION --}}
        <div class="hidden lg:flex flex-col justify-center items-center bg-gradient-to-br from-blue-600 to-blue-800 text-white p-16 relative overflow-hidden">

            {{-- CIRCLE EFFECT --}}
            <div class="absolute w-96 h-96 bg-white/10 rounded-full top-[-100px] left-[-100px]"></div>

            <div class="absolute w-96 h-96 bg-white/10 rounded-full bottom-[-120px] right-[-120px]"></div>

            <div class="relative z-10 text-center">

                {{-- LOGO --}}
                <div class="w-32 h-32 mx-auto rounded-full bg-white/20 backdrop-blur-lg flex items-center justify-center text-7xl shadow-2xl mb-10 border border-white/20">
                    🎓
                </div>

                {{-- TITLE --}}
                <h1 class="text-6xl font-black mb-6 tracking-wide">
                    TaskKu
                </h1>

                {{-- DESCRIPTION --}}
                <p class="text-blue-100 text-lg leading-8 max-w-md mx-auto">
                    Organize your academic life,
                    upload assignments,
                    manage schedules,
                    and boost productivity
                    every single day.
                </p>

                {{-- FEATURE BOX --}}
                <div class="grid grid-cols-2 gap-5 mt-12">

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-5 backdrop-blur-lg shadow-lg">
                        <div class="text-4xl mb-3">📚</div>
                        <h3 class="font-bold text-lg">
                            Study
                        </h3>
                        <p class="text-sm text-blue-100 mt-2">
                            Learn effectively and organize your materials.
                        </p>
                    </div>

                    <div class="bg-white/10 border border-white/10 rounded-3xl p-5 backdrop-blur-lg shadow-lg">
                        <div class="text-4xl mb-3">✅</div>
                        <h3 class="font-bold text-lg">
                            Tasks
                        </h3>
                        <p class="text-sm text-blue-100 mt-2">
                            Manage all assignments in one place.
                        </p>
                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT SECTION --}}
        <div class="p-8 md:p-14 flex flex-col justify-center">

            {{-- MOBILE LOGO --}}
            <div class="lg:hidden flex justify-center mb-8">

                <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center text-5xl shadow-xl">
                    🎓
                </div>

            </div>

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl shadow">

                    <ul class="space-y-2 list-disc ml-5">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- HEADING --}}
            <h2 class="text-5xl font-black text-gray-800 leading-tight">
                Welcome Back 👋
            </h2>

            <p class="text-gray-500 mt-3 mb-10 text-lg">
                Login to continue your productivity journey with TaskKu.
            </p>

            {{-- FORM --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf

                {{-- EMAIL --}}
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
                        class="w-full rounded-2xl border border-gray-300 bg-white px-5 py-4 text-gray-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-300"
                    >

                </div>

                {{-- PASSWORD --}}
                <div>

                    <div class="flex items-center justify-between mb-3">

                        <label class="text-sm font-bold text-gray-700">
                            Password
                        </label>

                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-600 hover:text-blue-800 hover:underline font-semibold transition">
                                Forgot Password?
                            </a>

                        @endif

                    </div>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full rounded-2xl border border-gray-300 bg-white px-5 py-4 text-gray-700 shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-300"
                    >

                </div>

                {{-- OPTIONS --}}
                <div class="flex items-center justify-between">

                    <label class="flex items-center gap-3 text-sm text-gray-600">

                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >

                        Remember me

                    </label>

                    <span class="text-sm text-green-600 font-semibold">
                        🔒 Secure Login
                    </span>

                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-lg font-bold shadow-xl transition duration-300 hover:scale-[1.01]"
                >
                    Login Now
                </button>

                {{-- REGISTER --}}
                <div class="text-center pt-2 text-gray-600">

                    Don’t have an account?

                    <a href="{{ route('register') }}"
                       class="text-blue-600 font-bold hover:underline">
                        Register
                    </a>

                </div>

            </form>

            {{-- FOOTER --}}
            <div class="flex justify-center gap-6 mt-12 text-sm text-gray-400">

                <span class="hover:text-blue-500 transition cursor-pointer">
                    Panduan
                </span>

                <span class="hover:text-blue-500 transition cursor-pointer">
                    Privasi
                </span>

                <span class="hover:text-blue-500 transition cursor-pointer">
                    Bantuan
                </span>

            </div>

        </div>

    </div>

</body>
</html>