<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .btn {
            display: block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin: 10px 0;
            color: #fff;
        }

        .logout-btn {
            background-color: #5c85d6;
        }

        .logout-btn:hover {
            background-color: #466bbf;
        }

        .update-btn {
            background-color: #4CAF50;
        }

        .update-btn:hover {
            background-color: #45a049;
        }

        .users-btn {
            background-color: #f44336;
        }

        .users-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <a class="btn logout-btn" href="logout.html">Logout</a>
        <a class="btn update-btn" href="update.html">Update Info</a>
        <a class="btn users-btn" href="users.php">View Registered Users</a>
    </div>
</body>
</html>
