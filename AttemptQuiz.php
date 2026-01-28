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
    <title>Attempt Quiz</title>
    <link rel="stylesheet" href="QuizStyle.css">
    <style>
    body {
            margin: 0;
            font-family: Arial, sans-serif;
    }
    .header {
    background-color: #4B3181;
    color: white;
    padding: 10px;
    text-align: left;
    width: 100%;
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
.logo{
    float: right;
    position: fixed;
    width: 150px;
    height: 146px;
    right: 10px;
    top: 10px;
}
        </style>

</head>

<body>
    <?php
    $ID = $_GET['qc'];
    $sql1 = "SELECT * FROM quiz WHERE QuizCode=$ID";
    $result1 = mysqli_query($con, $sql1);
    $result1 = mysqli_fetch_assoc($result1);
    $result1 = $result1['QuizName'];
    ?>
    <div class="header">
        <?php echo '<h1 class="title">' . $result1 . '</h1>' ?>
        <?php echo '<p class="sub-title">Code = ' . $ID . '</p>' ?>
        <img class="logo" src="logo.png" alt="Logo">
    </div>

    <?php
    $result = mysqli_query($con, "SELECT * FROM quizquestion WHERE QuizCode = '$ID'");
    $x = 1;
    while ($row = mysqli_fetch_array($result)) { ?>
        <table style="border: 2px solid black;" id="CreateQuestion">
            <form method="post" action="SubmitQuiz.php">
                <input type="hidden" name="quizCode" value="<?php echo $ID; ?>">
                <input type="hidden" name="id<?php echo $x; ?>" value="<?php echo $row['QuestionID'] ?>">
                <tr colspan="2">
                    <th>
                        <?php echo $row['Question'] ?>
                    </th>
                </tr>
                <tr>
                    <td><input type="radio" name="answer<?php echo $x; ?>" value="A" required>A.
                        <?php echo $row['option1'] ?>
                    </td>
                    <td>
                        <input type="radio" name="answer<?php echo $x; ?>" value="B" required>B.
                        <?php echo $row['option2'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="answer<?php echo $x; ?>" value="C" required>C.
                        <?php echo $row['option3'] ?>
                    </td>
                    <td>
                        <input type="radio" name="answer<?php echo $x; ?>" value="D" required>D.
                        <?php echo $row['option4'] ?>
                    </td>
                </tr>
        </table>
    <?php $x++;
    } ?>
    <input type="hidden" name="qn" value="<?php echo ($x - 1) ?>">
    <input type="submit" value="Submit Quiz">
    </form>
</body>

</html>
