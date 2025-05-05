<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
        }

        .button-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        button {
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 250px; /* Makes buttons wider for better readability */
        }

        button:first-child {
            background-color: #4CAF50;
            color: white;
        }

        button:last-child {
            background-color: #2196F3;
            color: white;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
<h1>Join As a Client or a Talent</h1>
<div class="button-container">
    <button onclick="window.location.href='{{ route('client.register.show') }}'">I'm a client, hiring for a project</button>
    <button>I'm a freelancer, looking for work</button>
</div>
</body>
</html>
