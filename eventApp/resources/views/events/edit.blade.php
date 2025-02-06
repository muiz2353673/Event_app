@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            background-size: 300% 300%;
            animation: gradientBG 8s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: zoomIn 0.8s ease;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            font-size: 2.5em;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container input:focus, .form-container textarea:focus {
            outline: none;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(106, 130, 251, 0.3);
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #36d1dc, #5b86e5);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(91, 134, 229, 0.5);
        }

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="event_name" value="{{ $event->event_name }}" required>
            <textarea name="description" rows="4">{{ $event->description }}</textarea>
            <input type="date" name="event_date" value="{{ $event->event_date }}" required>
            <input type="text" name="location" value="{{ $event->location }}" required>
            <button type="submit">Update Event</button>
        </form>
        @include('components.dashboard-button')
    </div>
   
</body>

</html>
@endsection
