<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOPBE Learning Platform - Online Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <title>HOPBE Learning Platform - Online Courses</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html,
        body {
            overflow-x: hidden;
        }

        .min-h-screen {
            min-height: 100vh;
            overflow-x: hidden;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .workshop-title {
            font-size: 36px;
            font-weight: bold;
            color: #2a4d6b;
            margin-bottom: 10px;
            animation: slideIn 1.5s ease-out;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('components.navbar')
        @include('components.carousel')
        @include('components.overview-intro')
        @include('components.overview-objectives')
        @include('components.testimonial-carousel')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>
