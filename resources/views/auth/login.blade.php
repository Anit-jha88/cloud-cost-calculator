<x-guest-layout>

   

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Email Address
            </label>

            <div class="relative">
                <span class="absolute left-4 top-3 text-lg">
                    📧
                </span>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border border-gray-300 pl-12 pr-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">

            </div>

            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-6">

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Password
            </label>

            <div class="relative">

                <span class="absolute left-4 top-3 text-lg">
                    🔒
                </span>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border border-gray-300 pl-12 pr-12 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">

                <button
                    type="button"
                    onclick="togglePassword()"
                    class="absolute right-4 top-3 text-gray-500 hover:text-blue-600">

                    👁️

                </button>

            </div>

            @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror

        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between mt-6">

            <label class="flex items-center">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-blue-600">

                <span class="ml-2 text-gray-600">
                    Remember Me
                </span>

            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">

                    Forgot Password?

                </a>
            @endif

        </div>

        <!-- Login Button -->

        <button
            type="submit"
            class="mt-8 w-full rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-3 font-semibold text-lg shadow-lg hover:scale-105 transition duration-300">

            🚀 Login

        </button>

        <!-- Register -->

        <div class="mt-8 text-center">

            <span class="text-gray-600">
                Don't have an account?
            </span>

            <a
                href="{{ route('register') }}"
                class="text-blue-600 hover:text-blue-800 font-bold">

                Register

            </a>

        </div>

    </form>

    <script>

        function togglePassword(){

            let password=document.getElementById('password');

            if(password.type==='password')
            {
                password.type='text';
            }
            else
            {
                password.type='password';
            }

        }

    </script>

</x-guest-layout>