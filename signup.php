<?php
include 'connection.php';
$show = false;
$showerror = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['fullname'];
    $num = $_POST['tel'];
    $pass = $_POST['password'];
    $confp = $_POST['confirm_password'];
    if ($pass == $confp) {
        $con = "INSERT INTO `users` (`name`, `Password`, `Confirm_Pass`, `phone_number`) VALUES ('$uname', '$pass', '$confp', '$num')";
        $res = mysqli_query($conn, $con);
        if ($res)
            $show = true;
    } else
        $showerror = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="signup.css">





    <style>
        .custom-alert {
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            color: #155724;
            background-color: #d4edda;
        }

        .custom-alert2 {
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            color: darkred;
            background-color: salmon;
        }



        .custom-alert h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .custom-alert p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <?php
    if ($show) {
        echo '<div class="container mt-4">
        <div class="custom-alert alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Welldone! Your Account has been created successfully. Go back to Login Page.</p>
        </div>
    </div>';
    }
    if ($showerror) {
        echo '<div class="container mt-4">
        <div class="custom-alert2 alert alert-danger" role="alert">
            <h4 class="alert-heading">Sorry!</h4>
            <p>Your entered data is not correct!Try again</p>
        </div>
    </div>';
    }
    ?>
    <div class="container">

        <h2>Create QuickChat Account</h2>
        <form method="POST">
            <div style="display: none;">
            </div>
            <div class="error-message"></div>
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>

            <label for="tel">Number</label>
            <input type="tel" id="tel" name="tel" placeholder="Enter your Phone Number" required>

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