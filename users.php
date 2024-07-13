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
    echo "You are not authorized to view this page.";
    exit();
}

$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registered Users</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['username'] . " (" . $row['email'] . ")</li>";
    }
    echo "</ul>";
} else {
    echo "No registered users found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{
            background-color:antiquewhite;
            display: grid;
            text-decoration:none;
            text-align: center;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

        }
    </style>
</head>
<body>
<p><a href="dashboard.php">Back</a></p>
</body>
</html>
