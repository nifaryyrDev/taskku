<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - TaskKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA] min-h-screen">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white shadow-lg flex flex-col justify-between p-6 hidden lg:flex">

        <div>

            <!-- LOGO -->
            <div class="flex items-center gap-3 mb-14">

                <div class="bg-blue-600 text-white w-14 h-14 rounded-full flex items-center justify-center text-2xl">
                    📘
                </div>

                <div>

                    <h1 class="text-3xl font-bold text-blue-700">
                        TaskKu
                    </h1>

                    <p class="text-gray-400 text-sm tracking-widest">
                        ACADEMIC ZEN
                    </p>

                </div>

            </div>

            <!-- MENU -->
            <nav class="space-y-4">

                <a href="/dashboard"
                   class="flex items-center gap-4 text-gray-500 hover:text-blue-700 hover:bg-gray-100 px-5 py-3 rounded-2xl text-lg transition">

                    📊 Dashboard

                </a>

                <a href="/profile"
                   class="flex items-center gap-4 bg-blue-100 text-gray-700 px-5 py-4 rounded-2xl text-lg font-medium">

                    ⚙️ Settings

                </a>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="flex items-center gap-4 text-red-500 hover:text-red-700 hover:bg-red-50 px-5 py-3 rounded-2xl text-lg w-full text-left transition"
                    >
                        🚪 Logout
                    </button>

                </form>

            </nav>

        </div>

        <!-- PROFILE -->
        <div class="bg-gray-100 rounded-3xl p-5">

            <h3 class="font-bold text-xl">
                {{ Auth::user()->name }}
            </h3>

            <p class="text-gray-500">
                Mahasiswa Aktif
            </p>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-6 lg:p-10">

        <!-- HEADER -->
        <div class="mb-10">

            <h1 class="text-5xl font-bold text-gray-900 mb-3">
                ⚙️ Settings Profile
            </h1>

            <p class="text-gray-500 text-xl">
                Kelola akun dan keamanan akun kamu.
            </p>

        </div>

        <!-- PROFILE CARD -->
        <div class="bg-white rounded-[35px] shadow-sm p-10 mb-10">

            <h2 class="text-3xl font-bold mb-8 text-gray-900">
                Informasi Profile
            </h2>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <!-- NAME -->
                <div class="mb-6">

                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <!-- EMAIL -->
                <div class="mb-8">

                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-2xl text-lg font-semibold"
                >
                    Simpan Perubahan
                </button>

            </form>

        </div>

        <!-- PASSWORD -->
        <div class="bg-white rounded-[35px] shadow-sm p-10">

            <h2 class="text-3xl font-bold mb-8 text-gray-900">
                🔒 Ubah Password
            </h2>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <!-- CURRENT -->
                <div class="mb-6">

                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        Password Lama
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        class="w-full bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <!-- NEW -->
                <div class="mb-6">

                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <!-- CONFIRM -->
                <div class="mb-8">

                    <label class="block text-lg font-semibold text-gray-700 mb-3">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-2xl text-lg font-semibold"
                >
                    Update Password
                </button>

            </form>

        </div>

    </main>

</div>

</body>
</html>