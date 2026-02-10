<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('storage/images/cert.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .certificate-content {
            text-align: center;
            position: absolute;
            top: 40%;
            width: 100%;
        }
        .user-name {
            font-size: 2.5rem;
            font-weight: 800;
            color: #7987b8;
        }
        .course-title {
            font-size: 1.5rem;
            font-weight: 500;
            color: #7987b8;
        }
    </style>
</head>
<body>
    <div class="certificate-content">
        <h3 class="user-name">{{ $user->name }}</h3>
        <p class="course-title">Successfully Completed: {{ $course->title }}</p>
    </div>
</body>
</html>
