<?php
session_start();
include("conn.php");


if (isset($_SESSION['AdminEmail'])) {
    $username = $_SESSION['AdminEmail'];


    $query = "SELECT QuizCode, QuizName,TCEmail FROM quiz";
    $qresult = $con->query($query);

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
    <title>Admin Dashboard</title>
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

        .logo {
            position: fixed;
            width: 150px;
            height: 146px;
            right: 10px;
            top: 10px;
        }

        .container {
            background-color: #C8C8C8;
            height: 650px;
            width: 1856px;
            top: 175px;
            margin: 42px;
            position: fixed;
            border-radius: 20px;
            z-index: -1;
            overflow-y: auto;
        }

        .quizcodebox,
        .titlebox,
        .TCEmailbox{
            background-color: #7D4FDE;
            height: 80px;
            position: absolute;
            top: 14px;
            border-radius: 20px;
            padding: 3px;
        }

        .quizcodebox {            
            width: 200px;
            left: 13px;
        }

        .titlebox {
            width: 250px;
            left: 575px;
        }

        .TCEmailbox {
            width: 180px;
            left: 1275px;
        }


        table {
            width: 100%;
            border-collapse: separate;
            position: relative;
            z-index: 1; 
            table-layout:fixed;
        }
        
        table,
        th,
        td {
            text-align: center;
            border-radius: 20px;
            font-size: 40px;

        }

        th,
        td {            
            padding: 15px;
        }

        th:first-child,
        td:first-child {
            width: 200px;
        }

        th:nth-child(2),
        td:nth-child(2) {
            overflow: hidden;
            text-overflow: ellipsis;   
        }

        th:nth-child(3),
        td:nth-child(3) {
            position: relative;
            width: 350px;
            overflow: hidden;
            text-overflow: ellipsis;   
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 250px;
        }

        th {
            color: white;
            height: 80px;
        }

        td {
            background-color: #EDEDED;
            margin: 5px;
        }

        ::-webkit-scrollbar {
        width: 20px;
        }

        ::-webkit-scrollbar-thumb {
        background: #4B3181; 
        border-radius: 10px;
        }

        .dltbutton {
            width: 180px;
            padding: 5px;
            background: red;
            border-radius: 15px;
            color: white;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 92%;
        }
        .dltbutton:hover{
            background: white;
            color: red;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }

        
        .button {
            width: 176px;
            padding: 10px;
            position: absolute;
            background: #3F2576;
            border-radius: 15px;
            color: white;
        }

        .button_text {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            word-wrap: break-word;
        }


    </style>
</head>

<body>
    <div class="header">
        <h1 class="title">Admin Dashboard</h1>
        <p class="sub-title"></p>
        <img class="logo" src="logo.png" alt="Logo">
    </div>
    <div class="container">
        <div class="quizcodebox"></div>
        <div class="titlebox"></div>
        <div class="TCEmailbox"></div>
        <?php
        echo "<table>";
        echo "<tr>";
        echo "<th>QuizCode</th>";
        echo "<th>QuizName</th>";
        echo "<th>TCEmail</th>";
        echo "<th></th>";
        echo "</tr>";

        if ($qresult->num_rows > 0) {
            while ($row = $qresult->fetch_assoc()) {
                $QuizCode = $row["QuizCode"];
                $QuizName = $row["QuizName"];
                $TCEmail = $row["TCEmail"];

                echo "<tr>";
                echo "<td>$QuizCode</td>";
                echo "<td>$QuizName</td>";
                echo "<td>$TCEmail</td>";
                echo "
                    <td>
                        <a href='Delete?quizcode=$QuizCode'>
                            <div class='dltbutton '>
                                <div class='button_text'>Delete</div>
                            </div>
                        </a>
                    </td>";
                echo "</tr>";
            }
        }

        $defaultRowCount = 7;

        for ($i = 1; $i <= $defaultRowCount; $i++) {
            echo "<tr>";
            echo "<td>&nbsp;</td>";
            echo "<td>&nbsp;</td>";
            echo "<td>&nbsp;</td>";
            echo "<td>&nbsp;</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>


    </div>
            <!-- Back Button -->
            <a href="Login.php">
            <div class="button" style="top: 906px; left: 80px;">
                    <div class="button_text">Back</div>
            </div>
        </a>
</body>

</html>
