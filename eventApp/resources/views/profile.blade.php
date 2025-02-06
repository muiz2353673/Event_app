<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            background-size: 300% 300%;
            animation: gradientBG 6s ease infinite;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 2.5em;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container input {
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

        .form-container input:focus {
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

        .form-container .dashboard-btn {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container .dashboard-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(255, 117, 140, 0.5);
        }

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update Your Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Your Name" required>
            <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email" required>
            <input type="password" name="password" placeholder="New Password (optional)">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
            <button type="submit">Save Changes</button>
        </form>
        <!-- Dashboard Button -->
        <a href="{{ route('dashboard') }}" class="dashboard-btn">Back to Dashboard</a>
    </div>
</body>
</html>
