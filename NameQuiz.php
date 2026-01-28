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
    <title>Quiz Code & Name</title>
</head>
<style>
input[type=submit], input[type=button]{
    background-color: #9178D7;
    font-size: large;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 25%;
    opacity: 0.9;
    border-radius: 10px;
}
p{
    font-size: 20px;
    font-family: Inter;
}
input[type=text]{
    font-size: 20px;
    font-family: Inter;
    border-radius: 10px;
    padding: 10px;
    border: 2px solid #9178D7;
    width: 25%;
}
</style>
<body>
<?php
    function generateUniqueNumber($con)
    {
        $quizCode = rand(100000, 999999);
        $sql = "SELECT * FROM quiz WHERE QuizCode = '$quizCode'";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = mysqli_num_rows($result);
        if ($row >= 1) {
            return generateUniqueNumber($con);
        } else {
            return $quizCode;
        }
    }

    $NewCode = generateUniqueNumber($con);
    echo "<p>Your quiz code is " .$NewCode;
    ?>
    <form method="post">
        <input type="text" name="QuizName" placeholder="Quiz Name"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $QuizName = $_POST['QuizName'];

        $sql = "INSERT INTO quiz (QuizName, QuizCode, TCemail) VALUES ('$QuizName', '$NewCode', '$email')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "Successfully Uploaded";
            echo '<script> window.location.href = "CreateQuiz.php?qc='.$NewCode.'"; </script>';
        } else {
            echo '<script>alert("Failed to Upload")</script>';
        }
    }
    ?>
</body>
</html>