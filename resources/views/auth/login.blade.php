<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <title>{{ env('APP_NAME', 'PBL IK-TI') }}</title>
</head>

<body class="bg-gray-100">

    <div class="font-[sans-serif]">
        <div class="min-h-screen flex items-center justify-center py-6 px-4">
            <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
                <!-- Login Form -->
                <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] mx-auto">
                    <form class="space-y-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-8">
                            <h3 class="text-gray-800 text-3xl font-extrabold">Sign in</h3>
                        </div>

                        <div>
                            <label for="inputEmailAddress" class="text-gray-800 text-sm mb-2 block">Alamat Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="email" id="inputEmailAddress" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Masukkan alamat email" value="{{ old('email') }}" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6"></circle>
                                    <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"></path>
                                </svg>
                            </div>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="inputChoosePassword" class="text-gray-800 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password" id="inputChoosePassword" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Enter password" />
                                <button type="button" onclick="togglePassword()" class="absolute right-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px]" viewBox="0 0 128 128">
                                        <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <input id="flexSwitchCheckChecked" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="flexSwitchCheckChecked" class="ml-3 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline font-semibold">
                                    Lupa password?
                                </a>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                Masuk
                            </button>
                        </div>

                        <p class="text-sm mt-8 text-center text-gray-800">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline ml-1">
                                Belum memilki akun?
                            </a>
                        </p>
                    </form>
                </div>

                <!-- Image -->
                <div class="lg:h-[400px] md:h-[300px] mt-8 md:mt-0">
                    <img src="https://readymadeui.com/login-image.webp" class="w-full h-full object-cover mx-auto block" alt="Dining Experience" />
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('inputChoosePassword');
            const passwordIcon = passwordInput.nextElementSibling.firstElementChild;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>

</html>
