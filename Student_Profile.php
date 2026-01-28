<?php
include("conn.php");

$sql = "SELECT Username, FirstName, Surname, Email, DOB FROM students WHERE Username = '$username'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fetchedUsername = $row["Username"];
    $firstName = $row["FirstName"];
    $surname = $row["Surname"];
    $email = $row["Email"];
    $dob = $row["DOB"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #4B3181;
            color: white;
            padding: 10px;
            text-align: left;
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

        .inputbox {
            width: 937px;
            height: 60px;
            position: absolute;
            background: #EDEDED;
            border-radius: 20px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            font-size: 36px;
        }

        .inputbox2 {
            width: 458px;
            height: 60px;
            position: absolute;
            background: #EDEDED;
            border-radius: 20px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            font-size: 36px;
        }

        .inputbox_title {
            width: 870px;
            height: 49px;
            position: absolute;
            color: black;
            font-size: 24px;
            font-weight: 500;
            word-wrap: break-word;
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
    <!-- Header -->
    <div class="header">
        <h1 class="title">My Profile</h1>
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

<!-- Username -->
<div class="inputbox_title" style="top: 280px; left: 106px;">Username:</div>
<div class="inputbox" style="top: 306px; left: 80px;"><?php echo $fetchedUsername; ?></div>

<!-- First Name -->
<div class="inputbox_title" style="top: 392px; left: 104px;">First Name:</div>
<div class="inputbox2" style="top: 418px; left: 80px;"><?php echo $firstName; ?></div>

<!-- Surname -->
<div class="inputbox_title" style="top: 392px; left: 582px;">Surname:</div>
<div class="inputbox2" style="top: 418px; left: 559px;"><?php echo $surname; ?></div>

<!-- Email -->
<div class="inputbox_title" style="top: 504px; left: 104px;">Email address:</div>
<div class="inputbox" style="top: 531px; left: 80px;"><?php echo $email; ?></div>

<!-- D.O.B -->
<div class="inputbox_title" style="top: 617px; left: 104px;">D.O.B:</div>
<div class="inputbox" style="top: 646px; left: 80px;"><?php echo $dob; ?></div>


    <!-- Back Button -->
    <a href="Student_Dash.php">
        <div class="button" style="top: 906px; left: 80px;">
                <div class="button_text">Back</div>
        </div>
    </a>

    <!-- Edit Button -->
    <a href="Student_Profile_Edit.php">
        <div class="button" style="top: 906px; left: 300px;">
                <div class="button_text">Edit Details</div>
        </div>
    </a>
</body>

</html>
