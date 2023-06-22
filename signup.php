<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include 'index1.php';

    $em = $_POST["email"];
    $uname = $_POST["fullname"];
    $pass = $_POST["password"];
    $cpass = $_POST["confirm_password"];
    if ($pass == $cpass) {
        $sql = "INSERT INTO `signup` (`name`, `email`, `pass`, `conf-pass`) VALUES ('$uname', '$em', '$pass', '$cpass')";
        $res = mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="h1">
        <h1>
            Welcome to TechMaze! Login before you enter.
        </h1>

    </div>

    <div class="container">
        <h2>Create Account</h2>
        <form method="POST">
            <div style="display: none;">
            </div>
            <div class="error-message"></div>
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email address" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter a strong password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

            <input type="submit" value="Create Account">
        </form>
        <p class="bottom-text">Already have an account? <a href="login.html">Log in</a></p>
    </div>

</body>

</html>

<!--    



 -->