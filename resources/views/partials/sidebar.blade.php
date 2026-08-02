@php
$isDashboard = request()->routeIs('dashboard');
$isEc2 = request()->routeIs('ec2.*');
@endphp

<aside id="sidebar"
    class="w-72 bg-slate-900 text-gray-200 min-h-screen flex flex-col shadow-2xl">

    <!-- Logo -->
    <div class="h-20 flex items-center justify-center border-b border-slate-800">

        <div class="text-center">

            <h1 class="text-2xl font-bold text-white tracking-wide">
                ☁ Cloud Cost
            </h1>

            <p class="text-xs text-slate-400 tracking-widest">
                CALCULATOR
            </p>

        </div>

    </div>

    <!-- Menu -->
    <nav class="flex-1 mt-6 px-4 space-y-2">

        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-xl  shadow
            {{ $isDashboard ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-slate-800' }}
            ">

            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

            Dashboard

        </a>

        <a href="{{ route('ec2.index') }}"
            class="flex items-center px-4 py-3 rounded-lg  transition
             {{ $isEc2 ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-slate-800' }}
            ">
            
            <i data-lucide="server" class="w-5 h-5 mr-3"></i>
            EC2 Calculator
        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="database" class="w-5 h-5"></i>

            RDS Calculator

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="hard-drive" class="w-5 h-5"></i>

            S3 Calculator

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="globe" class="w-5 h-5"></i>

            CloudFront

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="chart-column" class="w-5 h-5"></i>

            Reports

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="receipt-text" class="w-5 h-5"></i>

            Billing

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="users" class="w-5 h-5"></i>

            Users

        </a>

        <a href="#"
            class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            <i data-lucide="settings" class="w-5 h-5"></i>

            Settings

        </a>

    </nav>

    <!-- Footer -->
   

</aside>