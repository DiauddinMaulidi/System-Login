<?php
session_start();
    if ( !isset($_SESSION["login"]) ) {
        header("location: login.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Login Sederhana</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    
<h1>haii ini adalah halaman sederhana untuk belajar system login</h1>
<h2>💖💖💖</h2>
<p><a href="logout.php"><< logout</a></p>

</body>
</html>