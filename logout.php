<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            background-color: #f8f1e7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
        }

        a {
            display: inline-block;
            background-color: #5c85d6;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            background-color: #466bbf;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>You have been logged out</h2>
        <p><a href="login.html">Login again</a></p>
    </div>
</body>
</html>
