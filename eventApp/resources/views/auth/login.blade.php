<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background: linear-gradient(135deg, #1d3557, #457b9d, #a8dadc);
            background-size: 400% 400%;
            animation: gradientBG 6s ease infinite;
        }

        h1 {
            text-align: center;
            color: red;
            font-size: 2.5em;
            margin-bottom: 20px;
            animation: slideIn 1s ease-out;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            animation: zoomIn 0.8s ease;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #457b9d;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container input:focus {
            border-color: #1d3557;
            box-shadow: 0 0 8px rgba(29, 53, 87, 0.5);
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(45deg, #06d6a0, #118ab2);
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(6, 214, 160, 0.5);
        }

        .form-container .link {
            text-align: center;
            margin-top: 15px;
        }

        .form-container .link a {
            color: #118ab2;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .form-container .link a:hover {
            color: #06d6a0;
        }

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
        </div>
    </div>
</body>
</html>
