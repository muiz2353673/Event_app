<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb);
            background-size: 300% 300%;
            animation: gradientBG 6s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            animation: zoomIn 0.8s ease-out;
        }

        h1 {
            font-size: 2.5em;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #555;
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

        .form-container .back-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(255, 117, 140, 0.5);
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Event</h1>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <input type="text" name="event_name" placeholder="Event Name" required>
            <textarea name="description" placeholder="Description" rows="4"></textarea>
            <input type="date" name="event_date" required>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit">Add Event</button>
        </form>
        <a href="{{ route('events.index') }}" class="back-btn">Back to Events</a>
         <!-- Dashboard Button -->
    @include('components.dashboard-button')
    </div>
 
   
</body>

</html>
