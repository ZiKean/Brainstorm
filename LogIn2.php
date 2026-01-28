<?php
session_start();
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql3 = "SELECT AdminEmail FROM admin WHERE AdminEmail = '$email' AND password = '$password'";
    $result3 = mysqli_query($con, $sql3);

    if (mysqli_num_rows($result3) > 0) {
        $_SESSION['AdminEmail'] = $email;
        header("location: Admin_Dash.php");
        exit();
    }

    $sql1 = "SELECT username FROM Students WHERE email = '$email' AND password = '$password'";
    $result1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT surname FROM Teachers WHERE TCemail = '$email' AND password = '$password'";
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($result1) > 0) {
        $user_data = mysqli_fetch_assoc($result1);
        $_SESSION['username'] = $user_data['username'];
        header("location: Student_Dash.php");
        exit();

    } else if (mysqli_num_rows($result2) > 0) {
        $teacher_data = mysqli_fetch_assoc($result2);
        $_SESSION['TCemail'] = $email;
        header("location: TC_Dash.php");
        exit();
        
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("location: LogIn.php");
        exit();
    }
} else {
    header("location: LogIn.php");
    exit();
}

mysqli_close($con);
?>
