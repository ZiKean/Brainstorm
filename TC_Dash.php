<?php
session_start();
include("conn.php");

if (isset($_SESSION['TCemail'])) {
    $email = $_SESSION['TCemail'];

    $query = "SELECT Surname FROM teachers WHERE TCemail = '$email'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $surname = $row['Surname'];
    } else {
        header("location: LogIn.php");
        exit();
    }
} else {
    header("location: LogIn.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        body {
            background-color: #9178D7;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #4B3181;
            color: white;
            padding: 10px;
        }

        .title {
            margin-left: 45px;
            font-size: 64px;
        }

        .sub-title {
            margin-left: 45px;
            font-size: 32px;
        }
        .logo{
            position: fixed;
            width:150px;
            height:146px;
            right: 10px;
            top: 10px;
        }

        .logo-container {
            position: relative;
        }

        .brainstorm {
            width: 1350px;
            height: 619px;
            position: absolute;
            left: 285px;
            top: -200px;
        }

        .white-box {
            width: 1099px;
            height: 569px;
            position: absolute;
            left: 410px;
            top: 100px;
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
        }

        .frame {
            width: 100%;
            height: 100%;
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            margin-top: 10px;
        }
        .Myprofile{
            position: absolute;
            padding: 10px;
            margin: 5px;
            background: rgba(51.06, 0, 159.57, 0.60);
            color: white;
            font-size: 40px;
            border-radius: 20px;
            width: 286px; 
            height: 72px; 
            left: 807px; 
            top: 515px;
        }

        .Createdquiz{
            position: absolute;
            padding: 10px;
            margin: 5px;
            background: rgba(51.06, 0, 159.57, 0.60);
            color: white;
            font-size: 38px;
            border-radius: 20px;
            width: 286px; 
            height: 72px; 
            left: 807px; 
            top: 651px;
        }
        .Createquiz{
            position: absolute;
            padding: 10px;
            margin: 5px;
            background: rgba(51.06, 0, 159.57, 0.60);
            color: white;
            font-size: 40px;
            border-radius: 20px;
            width: 286px; 
            height: 72px; 
            left: 807px; 
            top: 787px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Dashboard</h1>
        <p class="sub-title">
            <?php
            if (isset($surname)) {
                echo "Welcome, $surname!";
            } else {
                header("location: LogIn.php");
                exit();
            }
            ?>
        </p>
        <img class="logo" src="logo.png" alt="Logo">
    </div>
    
    <div class="logo-container">
        <div class="white-box"></div>
        <img class="brainstorm" src="brainstorm.png" alt="Brainstorm">
        <div class="frame"></div>
    </div>

    <button class="Myprofile" onclick="location.href='TC_Profile.php'" type="button">My Profile</button>
    <button class="Createdquiz" onclick="location.href='TC_Created_Quiz.php'" type="button">Created Quiz</button>
    <button class="Createquiz" onclick="location.href='NameQuiz.php'" type="button">Create Quiz</button>
    
</body>
</html>