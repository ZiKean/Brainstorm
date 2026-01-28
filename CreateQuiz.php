<?php
session_start();
include("conn.php");

if (isset($_SESSION['TCemail'])) {
    $email = $_SESSION['TCemail'];
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
    <title>Create Quiz</title>
    <link rel="stylesheet" href="QuizStyle.css">
    <style>
    .header {
    background-color: #4B3181;
    color: white;
    padding: 10px;
    text-align: left;
    width: 100%;
    }
    .title {
        margin-left: 30px;
        font-size: 40px;
        }

    .sub-title {
        margin-left: 30px;
        font-size: 30px;
        }

    .logo{
        position: fixed;
        width:150px;
        height:146px;
        right: 10px;
        top: 10px;
        }
    input[type=submit], input[type=button]{
    background-color: #9178D7;
    font-size: large;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 30%;
    opacity: 0.9;
    border-radius: 10px;
}
        </style>
</head>
<body>
<?php
    include("conn.php");
    if(isset($_POST['submit']))
    
    {
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $answer = $_POST['answer'];
        $sql = "INSERT INTO quizquestion (QuizCode, Question, option1, option2, option3, option4, answer) VALUES ($_GET[qc],'$question', '$option1', '$option2', '$option3', '$option4', '$answer')";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            echo '<script>alert("Successfully Uploaded")</script>';
        }
        else
        {
            echo "Failed to Upload";
        }
    }
    $QC=$_GET['qc'];
    $sql1="SELECT * FROM quiz WHERE QuizCode=$QC";
    $result1=mysqli_query($con,$sql1);
    $result1=mysqli_fetch_assoc($result1);
    $result1=$result1['QuizName'];
?>
    <div class="header">
        <?php echo '<h1 class="title">'.$result1.'</h1>'?>
        <?php echo '<p class="sub-title">Code = '.$QC.'</p>'?>
        <input type="button" onclick="window.location.href='TC_Dash.php';alert('Upload Successful!')" value="Upload Quiz">
        <img class="logo" src="logo.png" alt="Logo">
    </div>
    <table style="border: 2px solid black;" id="CreateQuestion">
        <form method="post">
            <tr colspan="2">
                <th><input type="text" name="question" placeholder="Question" required></th>
            </tr>
            <tr>
                <td><input type="radio" name="answer" value="A" required>A. <input type="text" name="option1" id="option1" placeholder="Option 1" required>
            </td>    
                <td><input type="radio" name="answer" value="B" required>B. <input type="text" name="option2" id="option2" placeholder="Option 2" required>
            </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="answer" value="C" required>C. <input type="text" name="option3" id="option3" placeholder="Option 3" required>
                </td>
                <td>
                    <input type="radio" name="answer" value="D" required>D. <input type="text" name="option4" id="option4" placeholder="Option 4" required>
                </td>
            </tr>
        
    </table>
    <input type="submit" name="submit" value="+ Create New Question" onclick="window.location.href='CreateQuiz.php'">
</form>
</body>
</html>