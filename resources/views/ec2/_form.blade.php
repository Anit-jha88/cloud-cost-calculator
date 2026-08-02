@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg">

        <div class="border-b px-8 py-6">

            <h2 class="text-3xl font-bold text-slate-800">

               Edit EC2 Cost Calculator

            </h2>

           

            <div class="flex gap-3 justify-end">



                    <a href="{{ route('ec2.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition duration-200">
                    ← Back to List
                    </a>

            </div>

        </div>

       <form action="{{ $action }}" method="POST" class="p-8">

    @csrf

    @if($method!='POST')
        @method($method)
    @endif

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

                     <option value="t2.micro"
                            {{ old('instance_type',$estimate->instance_type ?? '')=='t2.micro'?'selected':'' }}>
                            t2.micro
                            </option>

                            <option value="t3.micro"
                            {{ old('instance_type',$estimate->instance_type ?? 't3.micro')=='t3.micro'?'selected':'' }}>
                            t3.micro
                            </option>

                            <option value="t3.small"
                            {{ old('instance_type',$estimate->instance_type ?? '')=='t3.small'?'selected':'' }}>
                            t3.small
                            </option>

                            <option value="t3.medium"
                            {{ old('instance_type',$estimate->instance_type ?? '')=='t3.medium'?'selected':'' }}>
                            t3.medium
                            </option>

                            <option value="m5.large"
                            {{ old('instance_type',$estimate->instance_type ?? '')=='m5.large'?'selected':'' }}>
                            m5.large
                            </option>

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

                        <option
                                {{ old('region',$estimate->region ?? '')=='Mumbai'?'selected':'' }}>
                                Mumbai
                                </option>

                                <option
                                {{ old('region',$estimate->region ?? '')=='N. Virginia'?'selected':'' }}>
                                N. Virginia
                                </option>

                                <option
                                {{ old('region',$estimate->region ?? '')=='Singapore'?'selected':'' }}>
                                Singapore
                                </option>

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

                            <option
                            {{ old('operating_system',$estimate->operating_system ?? '')=='Linux'?'selected':'' }}>
                            Linux
                            </option>

                            <option
                            {{ old('operating_system',$estimate->operating_system ?? '')=='Windows'?'selected':'' }}>
                            Windows
                            </option>
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

                        value="{{ old('instances',$estimate->instances ?? 1) }}"

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

                        value="{{ old('hours',$estimate->hours ?? 730) }}"

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

                        value="{{ old('storage',$estimate->storage ?? 30) }}"

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