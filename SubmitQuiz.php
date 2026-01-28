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
    <title>Document</title>
    <style>
        body {
            background-color: #A995DF;
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 30px;
            text-align: center;
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

        .button {
            width: 176px;
            padding: 10px;
            position: absolute;
            background: #3F2576;
            border-radius: 15px;
        }

        .button_text {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: 700;
            word-wrap: break-word;
        }

    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Quiz Completed!</h1>
            <p class="sub-title">
            <img class="logo" src="logo.png" alt="Logo">
    </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizCode = $_POST['quizCode'];
    $questionCount = $_POST['qn'];

    $score = 0;

    for ($i = 1; $i <= $questionCount; $i++) {
        $questionID = $_POST['id' . $i];
        $selectedAnswer = $_POST['answer' . $i];

        $result = mysqli_query($con, "SELECT answer FROM quizquestion WHERE QuestionID = '$questionID'");
        $row = mysqli_fetch_assoc($result);
        $correctAnswer = $row['answer'];

        if ($selectedAnswer == $correctAnswer) {
            $score++;
        }
    }

    echo "<h2> Username: $username </h2>";
    echo "<h2> Quiz Code: $quizCode </h2>";
    echo "<h2>Your Final Score: $score / $questionCount</h2>";
    

    $insertData = "INSERT INTO QuizResults (Username, QuizCode, Score, TotalQuestions) VALUES ('$username', '$quizCode', '$score', '$questionCount')";
    mysqli_query($con, $insertData);
} else {
    header("location: Student_Dash.php");
    exit();
}
?>
            <!-- Back Button -->
            <a href="Student_Dash.php">
            <div class="button" style="top: 906px; left: 80px;">
                    <div class="button_text">Back</div>
            </div>
        </a>
</body>
</html>
