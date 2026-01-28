<?php
include("conn.php");
if(isset($_POST['FindQuiz'])) {
    $QuizCode = $_POST['QuizCode'];

    $sql = "SELECT * FROM quizquestion WHERE QuizCode = $QuizCode";
    $result = mysqli_query($con, $sql);

    $row = mysqli_num_rows($result);
    if ($row >= 1) {
        echo '<script> window.location.href = "AttemptQuiz.php?qc='.$QuizCode.'"; </script>';
    } else {
        echo '<script>alert("Quiz does not exist")</script>';
        echo '<script> window.location.href = "Student_Dash.php"; </script>';
    }
}



?>