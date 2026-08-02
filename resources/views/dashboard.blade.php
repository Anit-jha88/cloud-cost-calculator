@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Cloud Dashboard

            </h1>

            <p class="text-gray-500 mt-2">

                Welcome back, {{ auth()->user()->name }}

            </p>

        </div>

     

    </div>

    <!-- Cards -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Card -->

        <div
            class="rounded-2xl bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-xl p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-blue-100">

                        Total Monthly Cost

                    </p>

                    <h2 class="text-4xl font-bold mt-3">

                        $245

                    </h2>

                </div>

                <div
                    class="bg-white/20 rounded-full p-4">

                    <i data-lucide="wallet"></i>

                </div>

            </div>

        </div>

        <div
            class="rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-xl p-6">

            <div class="flex justify-between">

                <div>

                    <p>

                        EC2

                    </p>

                    <h2 class="text-4xl font-bold mt-3">

                        $120

                    </h2>

                </div>

                <div
                    class="bg-white/20 rounded-full p-4">

                    <i data-lucide="server"></i>

                </div>

            </div>

        </div>

        <div
            class="rounded-2xl bg-gradient-to-r from-purple-600 to-fuchsia-600 text-white shadow-xl p-6">

            <div class="flex justify-between">

                <div>

                    <p>

                        RDS

                    </p>

                    <h2 class="text-4xl font-bold mt-3">

                        $60

                    </h2>

                </div>

                <div
                    class="bg-white/20 rounded-full p-4">

                    <i data-lucide="database"></i>

                </div>

            </div>

        </div>

        <div
            class="rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-xl p-6">

            <div class="flex justify-between">

                <div>

                    <p>

                        S3

                    </p>

                    <h2 class="text-4xl font-bold mt-3">

                        $65

                    </h2>

                </div>

                <div
                    class="bg-white/20 rounded-full p-4">

                    <i data-lucide="hard-drive"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Graph + Table -->

    <div class="grid lg:grid-cols-3 gap-6">

        <!-- Chart -->

        <div
            class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">

            <div
                class="flex justify-between items-center mb-6">

                <h2 class="text-xl font-bold">

                    Monthly Cost Overview

                </h2>

                <span
                    class="text-sm text-gray-500">

                    Last 6 Months

                </span>

            </div>

                <div class="relative h-80">
                <canvas id="costChart"></canvas>
                </div>

        </div>

        <!-- Recent -->

        <div
            class="bg-white rounded-2xl shadow-lg p-6">

            <h2
                class="text-xl font-bold mb-5">

                Recent Estimates

            </h2>

            <div
                class="space-y-4">

                <div
                    class="flex justify-between">

                    <span>

                        EC2

                    </span>

                    <span
                        class="font-bold text-blue-600">

                        $120

                    </span>

                </div>

                <div
                    class="flex justify-between">

                    <span>

                        RDS

                    </span>

                    <span
                        class="font-bold text-purple-600">

                        $60

                    </span>

                </div>

                <div
                    class="flex justify-between">

                    <span>

                        S3

                    </span>

                    <span
                        class="font-bold text-orange-600">

                        $65

                    </span>

                </div>

                <div
                    class="flex justify-between">

                    <span>

                        CloudFront

                    </span>

                    <span
                        class="font-bold text-green-600">

                        $30

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- Table -->

    <div
        class="bg-white rounded-2xl shadow-lg p-6">

        <div
            class="flex justify-between items-center mb-5">

            <h2
                class="text-xl font-bold">

                Latest Cost Estimates

            </h2>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded-lg">

                Export

            </button>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b bg-gray-50">

                        <th class="text-left p-3">

                            Service

                        </th>

                        <th class="text-left p-3">

                            Region

                        </th>

                        <th class="text-left p-3">

                            Monthly Cost

                        </th>

                        <th class="text-left p-3">

                            Status

                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">

                            EC2

                        </td>

                        <td class="p-3">

                            Mumbai

                        </td>

                        <td class="p-3 font-bold">

                            $120

                        </td>

                        <td class="p-3">

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                Active

                            </span>

                        </td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">

                            RDS

                        </td>

                        <td class="p-3">

                            Mumbai

                        </td>

                        <td class="p-3 font-bold">

                            $60

                        </td>

                        <td class="p-3">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                Running

                            </span>

                        </td>

                    </tr>

                    <tr class="hover:bg-gray-50">

                        <td class="p-3">

                            S3

                        </td>

                        <td class="p-3">

                            Global

                        </td>

                        <td class="p-3 font-bold">

                            $65

                        </td>

                        <td class="p-3">

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                Storage

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection