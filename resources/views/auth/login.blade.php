<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskKu Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-50 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8">

        {{-- Error --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-5">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Logo --}}
        <div class="flex justify-center mb-6">

            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center text-4xl shadow">
                🎓
            </div>

        </div>

        {{-- Title --}}
        <h1 class="text-4xl font-bold text-center text-gray-800">
            TaskKu
        </h1>

        <p class="text-center text-gray-500 mt-2 mb-8">
            Welcome back to your Academic Zen.
        </p>

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Gmail
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            {{-- Password --}}
            <div class="mb-5">

                <div class="flex justify-between mb-2">

                    <label class="text-sm font-semibold text-gray-700">
                        Password
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-600 hover:underline">
                            Forgot?
                        </a>
                    @endif

                </div>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

            </div>

            {{-- Remember --}}
            <div class="flex items-center mb-6">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-blue-600"
                >

                <span class="ml-2 text-sm text-gray-600">
                    Remember me
                </span>

            </div>

            {{-- Button --}}
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition duration-300"
            >
                Masuk
            </button>

            {{-- Register --}}
            <div class="text-center mt-6 text-sm text-gray-600">

                Belum punya akun?

                <a href="{{ route('register') }}"
                   class="text-blue-600 font-semibold hover:underline">
                    Daftar
                </a>

            </div>

        </form>

        {{-- Footer --}}
        <div class="flex justify-center gap-5 text-xs text-gray-400 mt-8">
            <span>Panduan</span>
            <span>Privasi</span>
            <span>Bantuan</span>
        </div>

    </div>

</body>
</html>