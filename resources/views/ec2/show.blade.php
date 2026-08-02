@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                EC2 Estimate Details
            </h1>

            <p class="text-gray-500 mt-1">
                View AWS EC2 monthly cost estimate.
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('ec2.edit', $estimate->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg shadow">
                ✏ Edit
            </a>

            <a href="{{ route('ec2.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition duration-200">
                ← Back to List
            </a>

        </div>

    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-8">

            <div>
                <label class="text-sm text-gray-500">
                    Instance Type
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->instance_type }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    AWS Region
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->region }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Operating System
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->operating_system }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Number of Instances
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->instances }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Usage Hours / Month
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->hours }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">
                    Storage
                </label>

                <div class="mt-2 text-xl font-semibold text-gray-800">
                    {{ $estimate->storage }} GB
                </div>
            </div>

        </div>

        <!-- Cost Summary -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-8">

            <div class="text-center">

                <p class="text-lg opacity-90">
                    Estimated Monthly Cost
                </p>

                <h2 class="text-5xl font-bold mt-3">
                    ${{ number_format($estimate->monthly_cost, 2) }}
                </h2>

            </div>

        </div>

        <!-- Footer -->
        <div class="bg-gray-50 border-t px-8 py-5 flex justify-between items-center">

            <div class="text-sm text-gray-500">
                Created :
                {{ $estimate->created_at->format('d M Y h:i A') }}
            </div>

            <div class="text-sm text-gray-500">
                Last Updated :
                {{ $estimate->updated_at->format('d M Y h:i A') }}
            </div>

        </div>

    </div>

</div>

@endsection