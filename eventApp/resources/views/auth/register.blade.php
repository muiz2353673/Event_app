<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb, #ff9a9e);
            background-size: 300% 300%;
            animation: gradientBG 8s ease infinite;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            color: #fff;
            animation: fadeInUp 1.2s ease;
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
            text-align: center;
            animation: bounceIn 1s ease;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #000;
        }

        .form-container input:focus {
            outline: none;
            border: 2px solid #fbc2eb;
            box-shadow: 0 0 10px #fbc2eb;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container button:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(255, 117, 140, 0.5);
        }

        .form-container .login-btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #36d1dc, #5b86e5);
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container .login-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(91, 134, 229, 0.5);
        }

        /* Animations */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounceIn {
            0% { transform: scale(0.8); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('login') }}" class="login-btn">Already Have an Account? Login Here</a>
    </div>
</body>
</html>
