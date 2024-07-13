<?php
session_start();
session_unset();
session_destroy();
echo "You have been logged out. <a href='login.html'>Login again</a>";
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

</body>
</html>
