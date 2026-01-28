<?php
session_start();
include("conn.php");

if (isset($_SESSION['AdminEmail'])) {
    if (isset($_GET['quizcode'])) {
        $Delete = $_GET['quizcode'];

        $deleteQuery = "DELETE FROM quiz WHERE QuizCode = '$Delete'";
        $deleteResult = $con->query($deleteQuery);

        if ($deleteResult) {
            header("location: Admin_Dash.php");
            exit();
        } else {
            echo "There was an error deleting quiz: " . $con->error;
        }
    }
} else {
    header("location: LogIn.php");
    exit();
}
?>
