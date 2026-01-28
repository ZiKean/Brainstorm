<?php
session_start();
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="LogInStyle.css">
</head>
<body>
    <div id="content"></div>
    <div style="width: 100%; position: absolute;"></div>
    <img src="laptop.png" width="60%" style="align-self:center;">
<div class = "flex-container">
    <form action="LogIn2.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="Log In">
        <p style="font-family: Inter; text-align: center;">Don't have an account yet?</p>
       <input type="button" value="Sign Up" onclick="window.location.href='SignUp.php'">
    </form>
</div>

</body>
</html>