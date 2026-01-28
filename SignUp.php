<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="styleSheet" href="SignUpStyle.css">
    <script src="SignUpJS.js"></script>
</head>
<body>
    <img src="brainstorm2.png" alt="Brainstorm Logo">
    <div style="width: 800px; margin:0 auto; position: relative;">
<div class="flex-container" id="tabgroup">
    <div class="tab" id="tab1" onclick="tab(1)">Student</div>
    <div class="tab" id="tab2" onclick="tab(2)">Teacher</div>
</div>
<div class="flex-container" id="contentgroup">
    <div class="content" id="content1">
    <form action="insert.php" method="post">
        <input type="hidden" name="user_type" value="Student">
        <input type="text" name="Username" placeholder="Username" required><br>
        <input type="text" name="FName" placeholder="First name" required>
        <input type="text" name="SName" placeholder="Surname" required><br>
        <input type="email" name="email_address" placeholder="Email" required><br>
        <input type="radio" name="gender" value="Male" required>Male
        <input type="radio" name="gender" value="Female" required>Female<br><br>
        <label for="dob">Date of Birth:</label><br>
        <input type="date" name="dob" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
            <br><br>
        <input type="submit" value="Create Account">
    </form>
    </div>
    <div class="content" id="content2">
    <form action="insert.php" method="post">
        <input type="hidden" name="user_type" value="Teacher">
        <input type="text" name="FName" placeholder="First name" required>
        <input type="text" name="SName" placeholder="Surname" required><br>
        <input type="email" name="TC_email_address" placeholder="Email" required><br>
        <input type="radio" name="gender" value="Male" required>Male
        <input type="radio" name="gender" value="Female" required>Female<br><br>
        <label for="dob">Date of Birth:</label><br>
        <input type="date" name="dob" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
            <br><br>
        <input type="submit" value="Create Account">
    </div>
</div>
</div>
</body>
</html>