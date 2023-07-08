<?php
include 'connection.php';
$show = false;
$showerror = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['tel2'];
    $pass = $_POST['password'];
    $verify = "SELECT * FROM users WHERE phone_number = '$num'";
    $con2 = mysqli_query($conn, $verify);
    if (mysqli_num_rows($con2) > 0) {
        $row = mysqli_fetch_assoc($con2);
        $storedPassword = $row['Password'];

        if ($pass == $storedPassword) {
            $show = true;
        } else {
            $showerror = true;
        }
    } else {
        $showerror = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">

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
            <p>Logged in Successfully.</p>
        </div>
    </div>';
    }
    if ($showerror) {
        echo '<div class="container mt-4">
        <div class="custom-alert2 alert alert-danger" role="alert">
            <h4 class="alert-heading">Sorry!</h4>
            <p>Incorrect data. Login again.</p>
        </div>
    </div>';
    }
    ?>

    <div class="container">
        <h2>Login to QuickChat</h2>
        <form method="POST">
            <div style="display: none;">
            </div>
            <input type="text" id="tel2" name="tel2" placeholder="Enter your Number" required>

            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <input type="submit" value="Login">

            <div class="bottom-text">
                Don't have an account? <a href="signup.html">Sign up now</a>
            </div>
        </form>
    </div>
    </form>
    </div>
</body>

</html>