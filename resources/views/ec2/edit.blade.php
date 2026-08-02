@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg">

        <div class="border-b px-8 py-6">

            <h2 class="text-3xl font-bold text-slate-800">
                Edit EC2 Estimate 
            </h2>

            <p class="text-gray-500 mt-2">
                Update your monthly Amazon EC2 estimate.
            </p>

           

        </div>

        @include('ec2._form', [
            'action' => route('ec2.update', $estimate->id),
            'method' => 'PUT',
            'buttonText' => 'Update Estimate',
            'estimate' => $estimate
        ])

    </div>

</div>

@endsection