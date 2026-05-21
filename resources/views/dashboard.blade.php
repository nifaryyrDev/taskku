<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TaskKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA]">

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

                <!-- DASHBOARD -->
                <a href="/dashboard"
                   class="flex items-center gap-4 bg-blue-100 text-gray-700 px-5 py-4 rounded-2xl text-lg font-medium hover:bg-blue-200 transition">

                    📊 Dashboard

                </a>

                <!-- UPLOAD -->
                <a href="#upload"
                   class="flex items-center gap-4 text-gray-500 hover:text-blue-700 hover:bg-gray-100 px-5 py-3 rounded-2xl text-lg transition">

                    📄 Upload PDF

                </a>

                <!-- CALENDAR -->
                <a href="#calendar"
                   class="flex items-center gap-4 text-gray-500 hover:text-blue-700 hover:bg-gray-100 px-5 py-3 rounded-2xl text-lg transition">

                    📅 Calendar

                </a>

                <!-- SETTINGS -->
                <a href="/profile"
                   class="flex items-center gap-4 text-gray-500 hover:text-blue-700 hover:bg-gray-100 px-5 py-3 rounded-2xl text-lg transition">

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
        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-10 gap-6">

            <div>

                <h1 class="text-5xl font-bold text-gray-900 mb-3">
                    Halo, {{ Auth::user()->name }}!
                </h1>

                <p class="text-gray-500 text-xl">
                    Kamu punya {{ count($tasks) }} tugas hari ini.
                </p>

            </div>

            <!-- PROFILE -->
            <div class="bg-white rounded-full shadow-md px-6 py-4 flex items-center gap-4 w-fit">

                <div class="bg-blue-100 text-blue-700 w-14 h-14 rounded-full flex items-center justify-center text-2xl">
                    🎓
                </div>

                <div>

                    <p class="text-sm text-gray-400 uppercase">
                        Mahasiswa
                    </p>

                    <h3 class="text-2xl font-bold text-blue-700">
                        Teknik Informatika
                    </h3>

                </div>

            </div>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

            <!-- TOTAL -->
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <div class="flex items-center gap-5">

                    <div class="bg-blue-100 text-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl">
                        📋
                    </div>

                    <div>

                        <p class="text-gray-500 text-lg">
                            TOTAL TUGAS
                        </p>

                        <h2 class="text-4xl font-bold">
                            {{ count($tasks) }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- PDF -->
            <div class="bg-white rounded-3xl shadow-sm p-8">

                <div class="flex items-center gap-5">

                    <div class="bg-blue-100 text-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl">
                        📄
                    </div>

                    <div>

                        <p class="text-gray-500 text-lg">
                            FILE PDF
                        </p>

                        <h2 class="text-4xl font-bold">
                            {{ count($tasks) }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- TITLE -->
        <div class="mb-6">

            <h2 class="text-4xl font-bold text-gray-900">
                Upload Tugas PDF
            </h2>

        </div>

        <!-- FORM -->
        <div id="upload" class="bg-white rounded-3xl shadow-sm p-6 mb-8">

            <form
                action="/tasks"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                    <!-- TITLE -->
                    <input
                        type="text"
                        name="title"
                        placeholder="Judul tugas..."
                        required
                        class="bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none focus:ring-2 focus:ring-blue-500"
                    >

                    <!-- FILE -->
                    <input
                        type="file"
                        name="file"
                        accept=".pdf"
                        required
                        class="bg-gray-100 rounded-2xl px-6 py-5 text-lg border-none"
                    >

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-5 rounded-2xl text-lg font-semibold"
                    >
                        Kirim PDF
                    </button>

                </div>

            </form>

        </div>

        <!-- CALENDAR -->
        <div id="calendar" class="bg-white rounded-3xl shadow-sm p-8 mb-8">

            <h2 class="text-3xl font-bold text-gray-900 mb-6">
                📅 Kalender Akademik
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <div class="bg-blue-100 text-blue-700 rounded-2xl p-6 text-center">

                    <h3 class="text-4xl font-bold">
                        17
                    </h3>

                    <p class="mt-2">
                        Mei
                    </p>

                </div>

                <div class="bg-gray-100 rounded-2xl p-6 text-center">

                    <h3 class="text-4xl font-bold">
                        20
                    </h3>

                    <p class="mt-2">
                        Deadline IMK
                    </p>

                </div>

                <div class="bg-gray-100 rounded-2xl p-6 text-center">

                    <h3 class="text-4xl font-bold">
                        25
                    </h3>

                    <p class="mt-2">
                        Presentasi
                    </p>

                </div>

                <div class="bg-gray-100 rounded-2xl p-6 text-center">

                    <h3 class="text-4xl font-bold">
                        30
                    </h3>

                    <p class="mt-2">
                        UTS
                    </p>

                </div>

            </div>

        </div>

        <!-- TASK LIST -->
        <div class="space-y-6">

            @forelse($tasks as $task)

                <div class="bg-white rounded-3xl shadow-sm p-8 flex flex-col lg:flex-row lg:justify-between lg:items-center gap-5">

                    <div>

                        <h3 class="text-3xl font-bold text-gray-800">
                            {{ $task->title }}
                        </h3>

                        <p class="text-gray-500 mt-2 text-lg">
                            📄 File Tugas PDF
                        </p>

                        @if($task->file)

                            <a
                                href="{{ asset('storage/' . $task->file) }}"
                                target="_blank"
                                class="text-blue-600 font-semibold mt-3 inline-block"
                            >
                                📥 Download PDF
                            </a>

                        @endif

                    </div>

                    <!-- DELETE -->
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-2xl"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            @empty

                <div class="bg-white rounded-3xl shadow-sm p-10 text-center text-gray-400 text-2xl">

                    Belum ada tugas PDF 😴

                </div>

            @endforelse

        </div>

    </main>

</div>

</body>
</html>