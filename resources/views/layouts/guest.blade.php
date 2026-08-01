<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cloud Cost Calculator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

<div class="min-h-screen flex bg-gradient-to-r from-sky-900 via-blue-700 to-cyan-500">

    <!-- Left Side -->
    <div class="hidden lg:flex w-1/2 text-white flex-col justify-center px-16">

        <h1 class="text-5xl font-bold leading-tight">
            ☁ Cloud Cost Calculator
        </h1>

        <p class="mt-6 text-xl text-blue-100">
            Estimate AWS Cloud Infrastructure Cost Easily.
        </p>

        <div class="mt-12">
            <div class="text-8xl">
                ☁️
            </div>
        </div>

        <ul class="mt-10 space-y-4 text-lg">
            <li>✔ EC2 Cost Estimation</li>
            <li>✔ RDS Pricing</li>
            <li>✔ S3 Storage Calculator</li>
            <li>✔ CloudFront Estimation</li>
            <li>✔ Cost Reports & Dashboard</li>
        </ul>

    </div>

    <!-- Right Side -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">

        <div class="bg-white shadow-2xl rounded-3xl p-10 w-full max-w-md">

            <div class="text-center mb-8">

                <div class="text-5xl">
                    ☁
                </div>

                <h2 class="text-3xl font-bold mt-3">
                    Welcome Back
                </h2>

                <p class="text-gray-500 mt-2">
                    Sign in to continue
                </p>

            </div>

            {{ $slot }}

        </div>

    </div>

</div>

</body>
</html>