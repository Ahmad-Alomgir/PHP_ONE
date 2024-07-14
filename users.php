<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];

$sql = "SELECT id FROM users ORDER BY created_at ASC LIMIT 1";
$result = $conn->query($sql);
$first_user = $result->fetch_assoc();

if ($first_user['id'] != $user_id) {
    echo "<div class='container'><h2>Authorization Error</h2><p>You are not authorized to view this page.</p><a href='dashboard.php' class='btn'>Back to Dashboard</a></div>";
    exit();
}

$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 24px;
            font-size: 28px;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 16px;
            text-align: left;
        }

        li:last-child {
            border-bottom: none;
        }

        a.btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 24px;
        }

        a.btn:hover {
            background-color: #45a049;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            li {
                font-size: 14px;
            }

            a.btn {
                padding: 10px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            echo "<h2>Registered Users</h2><ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['username']) . " (" . htmlspecialchars($row['email']) . ")</li>";
            }
            echo "</ul>";
        } else {
            echo "<h2>No registered users found.</h2>";
        }

        $conn->close();
        ?>
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
