 <?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include("conn.php");
    $user_type = $_POST['user_type'];

    if ($user_type == 'Student'){
        
    $Username = $_POST['Username'];
    $FName = $_POST['FName'];
    $SName = $_POST['SName'];
    $email_address = $_POST['email_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Students (Username, `FirstName`, Surname, Email, Gender, DOB, Password) VALUES ('$Username', '$FName', '$SName', '$email_address', '$gender', '$dob', '$password')";
    }
    elseif ($user_type == 'Teacher'){
    $FName = $_POST['FName'];
    $SName = $_POST['SName'];
    $TC_email_address = $_POST['TC_email_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Teachers (`FirstName`, Surname, TCemail, Gender, DOB, Password) VALUES ('$FName', '$SName', '$TC_email_address', '$gender', '$dob', '$password')";
    }

    if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
    }
    else {
        echo '<script>alert("Signup successful!");
        window.location.href = "LogIn.php";
        </script>';
    }
    mysqli_close($con);
} else {
    echo "<script>alert('Please key in the input.'); window.location.href='SignUp.php';</script>";
}
?>

