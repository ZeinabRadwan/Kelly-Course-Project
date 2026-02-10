<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Background fade-in animation */
        body {
            opacity: 0;
            animation: backgroundFadeIn 2.5s forwards;
        }

        @keyframes backgroundFadeIn {
            to {
                opacity: 1;
            }
        }

        /* Bounce effect for the logo */
        .application-logo {
            animation: logoBounce 2s ease-out;
        }

        @keyframes logoBounce {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            60% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Card fade-in */
        .w-full.sm\\:max-w-md {
            opacity: 0;
            animation: cardFadeIn 1.5s 0.5s forwards;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
            }
        }

    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900"
         style="background-image: url('https://nursery.hellobounce.com/assets/images/big/login-bg.jpg'); background-size: cover; background-position: center;">
        
        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <a href="/" class="flex justify-center mb-4 application-logo">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            {{ $slot }}
        </div>
        
    </div>
</body>
</html>
