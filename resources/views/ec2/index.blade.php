@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                EC2 Cost Estimates
            </h1>

            <p class="text-gray-500 mt-1">
                Manage and track your EC2 monthly cost estimates.
            </p>
        </div>

        <a href="{{ route('ec2.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow">

            + New Estimate

        </a>

    </div>

    <!-- Success Message -->

    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-5 py-4 rounded-xl">

            {{ session('success') }}

        </div>

    @endif

    <!-- Summary Cards -->

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500">

                Total Estimates

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $estimates->count() }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500">

                Total Monthly Cost

            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-3">

                ${{ number_format($estimates->sum('monthly_cost'),2) }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <p class="text-gray-500">

                Average Cost

            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-3">

                ${{ number_format($estimates->avg('monthly_cost') ?? 0,2) }}

            </h2>

        </div>

    </div>

    <!-- Table -->

    <div class="bg-white rounded-2xl shadow">

        <div class="p-6 border-b flex justify-between">

            <h2 class="text-xl font-bold">

                EC2 Estimates

            </h2>
       <form method="GET" action="{{ route('ec2.index') }}">
            <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search instance, region..."
            class="border rounded-lg px-4 py-2 w-72 focus:ring-2 focus:ring-blue-500">
        </form>
        </div>

        <div class="overflow-x-auto">

        

            <table class="w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">#</th>

                    <th class="p-4 text-left">Instance</th>

                    <th class="p-4 text-left">Region</th>

                    <th class="p-4 text-left">OS</th>

                    <th class="p-4 text-left">Instances</th>

                    <th class="p-4 text-left">Hours</th>

                    <th class="p-4 text-left">Storage</th>

                    <th class="p-4 text-left">Monthly Cost</th>

                    <th class="p-4 text-center">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($estimates as $estimate)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4">

                            {{ $loop->iteration }}

                        </td>

                        <td class="p-4 font-semibold">

                            {{ $estimate->instance_type }}

                        </td>

                        <td class="p-4">

                            {{ $estimate->region }}

                        </td>

                        <td class="p-4">

                            {{ $estimate->operating_system }}

                        </td>

                        <td class="p-4">

                            {{ $estimate->instances }}

                        </td>

                        <td class="p-4">

                            {{ $estimate->hours }}

                        </td>

                        <td class="p-4">

                            {{ $estimate->storage }} GB

                        </td>

                        <td class="p-4 font-bold text-blue-600">

                            ${{ number_format($estimate->monthly_cost,2) }}

                        </td>

                      <td class="px-6 py-4">
                            <div class="flex items-center gap-2">

                                <a href="{{ route('ec2.show', $estimate->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                    View
                                </a>

                                <a href="{{ route('ec2.edit', $estimate->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('ec2.destroy', $estimate->id) }}"
                                    method="POST"
                                    class="delete-form inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center py-10 text-gray-500">

                            No EC2 estimates found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>
            <div class="mt-6">
                {{ $estimates->withQueryString()->links() }}
            </div>
        </div>

    </div>

</div>

@endsection