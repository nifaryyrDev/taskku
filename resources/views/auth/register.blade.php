<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TaskKu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F4F6F8] min-h-screen">

<div class="min-h-screen flex flex-col lg:flex-row">

    <!-- LEFT -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-24 py-10">

        <h1 class="text-5xl font-bold text-blue-700 mb-10">
            ✦ TaskKu
        </h1>

        <div class="inline-block bg-blue-100 text-blue-700 px-5 py-2 rounded-full text-sm font-semibold mb-6 w-fit">
            🎓 JOIN STUDENTS
        </div>

        <h2 class="text-5xl font-bold text-gray-900 leading-tight mb-6">
            Find your academic
            <span class="text-blue-700">
                Zen.
            </span>
        </h2>

        <p class="text-gray-600 text-xl leading-relaxed max-w-xl">
            Organize coursework, track deadlines,
            and stay productive with TaskKu.
        </p>

    </div>

    <!-- RIGHT -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12">

        <div class="w-full max-w-xl bg-white rounded-[40px] shadow-xl p-10">

            <!-- ERROR -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">

                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <!-- LOGIN -->
            <div class="text-right mb-8">

                <a href="{{ route('login') }}"
                   class="text-gray-500 font-semibold hover:text-blue-700">
                    Already have an account?
                </a>

            </div>

            <!-- TITLE -->
            <h1 class="text-5xl font-bold text-gray-900 mb-3">
                Create Account
            </h1>

            <p class="text-gray-500 text-lg mb-10">
                Start your journey today.
            </p>

            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- NAME -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 border-none"
                    >

                </div>

                <!-- EMAIL -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 border-none"
                    >

                </div>

                <!-- PASSWORD -->
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 border-none"
                    >

                </div>

                <!-- CONFIRM -->
                <div class="mb-8">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 border-none"
                    >

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white py-5 rounded-2xl text-xl font-semibold shadow-lg transition"
                >
                    Buat Akun
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>