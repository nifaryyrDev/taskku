<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TaskKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-white shadow-lg flex flex-col justify-between p-6 hidden lg:flex">

        <div>

            <!-- LOGO -->
            <div class="mb-16">

                <h1 class="text-4xl font-bold text-blue-700">
                    TaskKu
                </h1>

                <p class="text-gray-400 tracking-widest text-sm">
                    Academic Zen Admin
                </p>

            </div>

            <!-- MENU -->
            <nav class="space-y-4">

                <a href="#"
                   class="flex items-center gap-4 bg-blue-100 px-5 py-4 rounded-2xl text-lg font-medium text-gray-700">

                    📋 Semua Tugas User

                </a>

                <a href="#"
                   class="flex items-center gap-4 px-5 py-3 text-lg text-gray-500 hover:text-blue-700">

                    👥 Manajemen User

                </a>

                <a href="/profile"
                   class="flex items-center gap-4 px-5 py-3 text-lg text-gray-500 hover:text-blue-700">

                    ⚙️ Settings

                </a>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="flex items-center gap-4 text-red-500 hover:text-red-700 px-5 py-3 text-lg w-full text-left"
                    >
                        🚪 Logout
                    </button>

                </form>

            </nav>

        </div>

        <!-- ADMIN -->
        <div class="bg-gray-100 rounded-3xl p-5">

            <h3 class="font-bold text-xl">
                {{ Auth::user()->name }}
            </h3>

            <p class="text-gray-500">
                Super Admin
            </p>

        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-6 lg:p-10">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-10">

            <h1 class="text-5xl font-bold text-gray-900">
                Semua Tugas User
            </h1>

            <!-- SEARCH -->
            <div class="bg-white rounded-full px-6 py-4 shadow-sm w-full lg:w-[400px]">

                <input
                    type="text"
                    placeholder="Cari tugas atau user..."
                    class="w-full border-none focus:ring-0 outline-none bg-transparent"
                >

            </div>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

            <!-- USERS -->
            <div class="bg-white rounded-3xl p-8 shadow-sm">

                <p class="text-gray-500 text-lg">
                    Total Users
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    {{ \App\Models\User::count() }}
                </h2>

            </div>

            <!-- TASKS -->
            <div class="bg-white rounded-3xl p-8 shadow-sm">

                <p class="text-gray-500 text-lg">
                    Total Tasks
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    {{ \App\Models\Task::count() }}
                </h2>

            </div>

            <!-- COMPLETION -->
            <div class="bg-white rounded-3xl p-8 shadow-sm">

                <p class="text-gray-500 text-lg">
                    Avg Completion
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    74%
                </h2>

                <div class="w-full bg-gray-200 rounded-full h-3 mt-4">

                    <div class="bg-blue-600 h-3 rounded-full w-3/4"></div>

                </div>

            </div>

            <!-- ACTIVE -->
            <div class="bg-blue-700 text-white rounded-3xl p-8 shadow-lg">

                <p class="text-lg opacity-80">
                    Active Now
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    {{ \App\Models\User::count() }}
                </h2>

            </div>

        </div>

        <!-- FORM -->
        <div class="bg-white rounded-[35px] shadow-sm p-8 mb-10">

            <h2 class="text-3xl font-bold text-gray-900 mb-6">
                Kirim Tugas ke Mahasiswa
            </h2>

            <form
                action="/admin/tasks"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

                    <!-- USER -->
                    <select
                        name="user_id"
                        required
                        class="bg-gray-100 border border-gray-300 rounded-2xl px-5 py-4"
                    >

                        <option value="">
                            Pilih Mahasiswa
                        </option>

                        @foreach(\App\Models\User::where('role', 'user')->get() as $user)

                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>

                        @endforeach

                    </select>

                    <!-- TITLE -->
                    <input
                        type="text"
                        name="title"
                        placeholder="Masukkan tugas..."
                        required
                        class="bg-gray-100 border border-gray-300 rounded-2xl px-5 py-4"
                    >

                    <!-- PDF -->
                    <input
                        type="file"
                        name="file"
                        accept=".pdf"
                        required
                        class="bg-gray-100 border border-gray-300 rounded-2xl px-5 py-4"
                    >

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white rounded-2xl px-6 py-4 font-semibold"
                    >
                        Kirim Tugas
                    </button>

                </div>

            </form>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-[35px] shadow-sm overflow-hidden">

            <!-- HEADER -->
            <div class="p-8 border-b flex justify-between items-center flex-wrap gap-4">

                <div>

                    <h2 class="text-4xl font-bold text-gray-900 mb-2">
                        Log Tugas Terbaru
                    </h2>

                    <p class="text-gray-500 text-lg">
                        Memantau semua aktivitas tugas mahasiswa.
                    </p>

                </div>

                <button
                    class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-2xl"
                >
                    Export CSV
                </button>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-50 text-gray-500 uppercase text-sm">

                        <tr>

                            <th class="p-6 text-left">User</th>
                            <th class="p-6 text-left">Judul Tugas</th>
                            <th class="p-6 text-left">Waktu Input</th>
                            <th class="p-6 text-left">Status</th>
                            <th class="p-6 text-left">PDF</th>
                            <th class="p-6 text-left">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($tasks as $task)

                            <tr class="border-b hover:bg-gray-50 transition">

                                <!-- USER -->
                                <td class="p-6">

                                    <div class="flex flex-col gap-1">

                                        <h3 class="font-bold text-lg text-gray-800">
                                            {{ $task->user->name ?? 'User' }}
                                        </h3>

                                        <p class="text-gray-400 text-sm">
                                            {{ $task->user->email ?? '-' }}
                                        </p>

                                        <div class="flex items-center gap-2 mt-2">

                                            <span
                                                class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold"
                                            >
                                                📤 Dikirim oleh Admin
                                            </span>

                                        </div>

                                    </div>

                                </td>

                                <!-- TITLE -->
                                <td class="p-6">

                                    <h3 class="font-semibold text-lg">
                                        {{ $task->title }}
                                    </h3>

                                </td>

                                <!-- TIME -->
                                <td class="p-6 text-gray-500">

                                    {{ $task->created_at->diffForHumans() }}

                                </td>

                                <!-- STATUS -->
                                <td class="p-6">

                                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm">
                                        Terjadwal
                                    </span>

                                </td>

                                <!-- PDF -->
                                <td class="p-6">

                                    @if($task->file)

                                        <div class="flex gap-3">

                                            <!-- VIEW -->
                                            <a
                                                href="{{ asset('storage/' . $task->file) }}"
                                                target="_blank"
                                                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold"
                                            >
                                                👁️ Lihat
                                            </a>

                                            <!-- DOWNLOAD -->
                                            <a
                                                href="{{ asset('storage/' . $task->file) }}"
                                                download
                                                class="bg-green-100 hover:bg-green-200 text-green-700 px-4 py-2 rounded-xl text-sm font-semibold"
                                            >
                                                ⬇️ Download
                                            </a>

                                        </div>

                                    @else

                                        <span class="text-gray-400">
                                            Tidak ada PDF
                                        </span>

                                    @endif

                                </td>

                                <!-- DELETE -->
                                <td class="p-6">

                                    <form action="/tasks/{{ $task->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="p-10 text-center text-gray-400 text-2xl">

                                    Belum ada tugas 😴

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

</body>
</html>