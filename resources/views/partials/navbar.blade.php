<nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-40">

    <div class="flex items-center justify-between px-6 py-4">

        <!-- Left -->
        <div class="flex items-center gap-4">

            <button id="mobile-menu-btn"
                class="lg:hidden text-gray-600 hover:text-blue-600">

                <i data-lucide="menu" class="w-6 h-6"></i>

            </button>

            <div>

                <h2 class="text-2xl font-bold text-slate-800">
                    Dashboard
                </h2>

                <p class="text-sm text-gray-500">
                    Welcome back,
                    {{ auth()->user()->name }}
                </p>

            </div>

        </div>

        <!-- Search -->

        <div class="hidden md:block flex-1 max-w-lg mx-8">

            <div class="relative">

                <i data-lucide="search"
                    class="absolute left-4 top-3 w-5 h-5 text-gray-400"></i>

                <input
                    type="text"
                    placeholder="Search AWS Services..."
                    class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">

            </div>

        </div>

        <!-- Right -->

        <div class="flex items-center gap-5">

            <!-- Dark Mode -->

            <button
                class="p-2 rounded-lg hover:bg-gray-100">

                <i data-lucide="moon"
                    class="w-5 h-5"></i>

            </button>

            <!-- Notification -->

            <button
                class="relative p-2 rounded-lg hover:bg-gray-100">

                <i data-lucide="bell"
                    class="w-5 h-5"></i>

                <span
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">

                    3

                </span>

            </button>

            <!-- User -->

            <div class="relative">

                <button
                    id="userMenuButton"
                    class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <div class="hidden md:block text-left">

                        <p class="font-semibold">

                            {{ auth()->user()->name }}

                        </p>

                        <p class="text-xs text-gray-500">

                            Administrator

                        </p>

                    </div>

                    <i
                        data-lucide="chevron-down"
                        class="w-4 h-4"></i>

                </button>

                <!-- Dropdown -->

                <div
                    id="userDropdown"
                    class="hidden absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border overflow-hidden z-50">

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">

                        <i data-lucide="user" class="w-4 h-4"></i>

                        Profile

                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">

                        <i data-lucide="settings" class="w-4 h-4"></i>

                        Settings

                    </a>

                    <hr>

                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            class="w-full text-left flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50">

                            <i data-lucide="log-out" class="w-4 h-4"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</nav>

<script>

document.addEventListener("DOMContentLoaded", function () {

    lucide.createIcons();

    const btn = document.getElementById("userMenuButton");

    const menu = document.getElementById("userDropdown");

    btn.addEventListener("click", function (e) {

        e.stopPropagation();

        menu.classList.toggle("hidden");

    });

    document.addEventListener("click", function () {

        menu.classList.add("hidden");

    });

    menu.addEventListener("click", function (e) {

        e.stopPropagation();

    });

});

</script>