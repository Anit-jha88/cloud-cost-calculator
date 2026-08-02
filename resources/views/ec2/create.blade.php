@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg">

        <div class="border-b px-8 py-6">

            <h2 class="text-3xl font-bold text-slate-800">

                EC2 Cost Calculator

            </h2>

            <p class="text-gray-500 mt-2">

                Estimate your monthly Amazon EC2 cost.

            </p>

        </div>

        <form
            action="{{ route('ec2.store') }}"
            method="POST"
            class="p-8">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- Instance -->

                <div>

                    <label class="block font-semibold mb-2">

                        Instance Type

                    </label>

                    <select
                        id="instance_type"
                        name="instance_type"
                        class="w-full border rounded-xl px-4 py-3">

                        <option value="t2.micro">t2.micro</option>

                        <option value="t3.micro" selected>t3.micro</option>

                        <option value="t3.small">t3.small</option>

                        <option value="t3.medium">t3.medium</option>

                        <option value="m5.large">m5.large</option>

                    </select>

                </div>

                <!-- Region -->

                <div>

                    <label class="block font-semibold mb-2">

                        Region

                    </label>

                    <select
                        name="region"
                        class="w-full border rounded-xl px-4 py-3">

                        <option>Mumbai</option>

                        <option>N. Virginia</option>

                        <option>Singapore</option>

                    </select>

                </div>

                <!-- OS -->

                <div>

                    <label class="block font-semibold mb-2">

                        Operating System

                    </label>

                    <select
                        name="operating_system"
                        class="w-full border rounded-xl px-4 py-3">

                        <option>Linux</option>

                        <option>Windows</option>

                    </select>

                </div>

                <!-- Instances -->

                <div>

                    <label class="block font-semibold mb-2">

                        Number of Instances

                    </label>

                    <input

                        id="instances"

                        type="number"

                        name="instances"

                        value="1"

                        min="1"

                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- Hours -->

                <div>

                    <label class="block font-semibold mb-2">

                        Running Hours

                    </label>

                    <input

                        id="hours"

                        type="number"

                        name="hours"

                        value="730"

                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <!-- Storage -->

                <div>

                    <label class="block font-semibold mb-2">

                        Storage (GB)

                    </label>

                    <input

                        id="storage"

                        type="number"

                        name="storage"

                        value="30"

                        class="w-full border rounded-xl px-4 py-3">

                </div>

            </div>

            <!-- Cost -->

            <div
                class="mt-8 bg-slate-100 rounded-xl p-6 text-center">

                <h3
                    class="text-lg text-gray-600">

                    Estimated Monthly Cost

                </h3>

                <div
                    id="estimatedCost"
                    class="text-5xl font-bold text-blue-600 mt-3">

                    $0.00

                </div>

            </div>

            <div
                class="flex justify-end gap-4 mt-8">

                <button
                    type="button"
                    id="calculateBtn"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl">

                    Calculate

                </button>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Save Estimate

                </button>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')

<script>

async function calculateCost() {



    const data = {

        instance_type: document.getElementById('instance_type').value,

        region: document.querySelector('[name="region"]').value,

        operating_system: document.querySelector('[name="operating_system"]').value,

        instances: document.getElementById('instances').value,

        hours: document.getElementById('hours').value,

        storage: document.getElementById('storage').value

    };

    const response = await fetch("{{ route('ec2.calculate') }}", {

        method: "POST",

        headers: {

            "Content-Type":"application/json",

            "X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').content

        },

        body: JSON.stringify(data)

    });

    const result = await response.json();

   

    document.getElementById("estimatedCost").innerHTML="$"+result.cost;

}

document.querySelectorAll("input,select").forEach(item=>{

    item.addEventListener("change",calculateCost);

    item.addEventListener("keyup",calculateCost);

});

document.getElementById("calculateBtn")
.addEventListener("click",calculateCost);

calculateCost();

</script>

@endpush