<?php
session_start();
include("conn.php");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
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
    <title>Student Dashboard</title>
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
            left: 126px;
            top: -200px;
        }

        .white-box {
            width: 1099px;
            height: 569px;
            position: absolute;
            left: 251px;
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

        .quiz-code-input {
            position: absolute;
            left: 484px;
            top: 557px;
            padding: 10px;
            font-size: 40px;
            height: 50px;
            width: 600px;
            border: 5px solid #ccc;
            border-radius: 20px;
            margin-top: 10px;
            background: #D8D8D8;
        }

        .code-word {
            position: absolute;
            left: 555px;
            top: 494px;
            width: 492px;
            height: 82px;
            position: absolute;
            text-align: center;
            color: black;
            font-size: 50px;
            font-weight: 700;
            word-wrap: break-word;
        }

        .join-game {
            position: absolute;
            padding: 10px;
            background: #3F2576;
            border-radius: 20px;
            width: 349px; 
            height: 107px; 
            left: 626px; 
            top: 688px;
            color: white;
            font-size: 50px;
        }

        .Myprofile{
            position: absolute;
            padding: 10px;
            margin: 5px;
            background: rgba(51.06, 0, 159.57, 0.60);
            color: white;
            font-size: 40px;
            border-radius: 20px;
            width: 250px; 
            height: 70px; 
            left: 1476px; 
            top: 329px;
        }

        .Quizhistory{
            position: absolute;
            padding: 10px;
            margin: 5px;
            background: rgba(51.06, 0, 159.57, 0.60);
            color: white;
            font-size: 40px;
            border-radius: 20px;
            width: 250px; 
            height: 70px; 
            left: 1476px; 
            top: 426px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Dashboard</h1>
        <p class="sub-title">
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "Welcome, $username!";
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
    
    <div class="code-word">
        <label for="quiz-code" >Enter Quiz Code</label><br>
    </div>

    <form method="post" action="FindQuiz.php">
    <input type="text" id="quiz-code" class="quiz-code-input" name="QuizCode" minlength="6"><br>
    <input type="submit" value="Join Game!" class="join-game" name="FindQuiz">
    </form>
    
    <button class="Myprofile" onclick="location.href='Student_Profile.php'" type="button">My Profile</button>
    <button class="Quizhistory" onclick="location.href='Student_View_History.php'" type="button">Quiz History</button>


</body>
</html>