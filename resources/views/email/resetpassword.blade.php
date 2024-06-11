<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        input[type="hidden"] {
            display: none;
        }

        a {
            text-decoration: none; /* Remove underline from the link */
        }

        .button {
            background-color: #3490dc;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .button:hover {
            background-color: #2779bd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Forgot Password</h1>
        <p>Click the button below to reset your password:</p>
        <a href="{{ route('reset-password-page',['token' => $token]) }}" class="button">Reset Password</a>
    </div>
</body>

</html>
