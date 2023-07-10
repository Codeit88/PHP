<?php
session_start();
include 'connection.php';
$er1 = false;
$er2 = false;
$my_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['chgna'];
    $num = $_POST['num'];
    $pass = $_POST['chgpas'];
    $confp = $_POST['confpas'];

    $sql = "SELECT id FROM users WHERE id='$my_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE users SET users.name = '$uname' WHERE id ='$my_id'";
        $sql1 = "UPDATE users SET phone_number = '$num' WHERE id ='$my_id'";
        $sql2 = "UPDATE users SET users.Password = '$pass' WHERE id ='$my_id'";
        $sql3 = "UPDATE users SET Confirm_Pass = '$confp' WHERE id ='$my_id'";
        // if ($uname != $row['name'])

        if ($pass == $confp) {
            $exec1 = mysqli_query($conn, $sql);
            // if ($num != $row['phone_number'])
            $exec2 = mysqli_query($conn, $sql1);

            $exec3 = mysqli_query($conn, $sql2);
            $exec4 = mysqli_query($conn, $sql3);
            $er1 = true;
        } else
            $er2 = true;
    } else
        $er2 = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Settings</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #b4c4d3 0%, #FFFFFF 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-alert {
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            color: #155724;
            background-color: #d4edda;
        }

        .custom-alert2 {
            border-radius: 5px;
            padding: 10px;
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


        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus {
            outline: none;
            border-color: #128C7E;
        }

        input[type="submit"] {
            background-color: #128C7E;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #075E54;
        }
    </style>
</head>

<body>

    <?php
    if ($er1) {
        echo '<div class="container mt-4">
        <div class="custom-alert alert alert-success" role="alert">
            <p>Changes Made Successfully!</p>
        </div>
    </div>';
    }
    if ($er2) {
        echo '<div class="container mt-4">
        <div class="custom-alert2 alert alert-danger" role="alert">
            <h4 class="alert-heading">Sorry!</h4>
            <p>Incorrect data. Try Again</p>
        </div>
    </div>';
    }
    ?>




    <form action="" method="post">
        <label for="Chgname">Change Name</label>
        <input type="text" id="chgna" class="chgna" name='chgna' placeholder="Enter new Name" required>
        <label for="chgpass">Change Password</label>
        <input type="password" id="chgpas" class="chgpas" name="chgpas" placeholder="Enter new password" required>
        <input type="password" id="confpas" class="confpas" name="confpas" placeholder="Confirm password" required>
        <label for="chgno">Edit PhoneNumber</label>
        <input type="tel" name="num" id="num" placeholder="New Number" required>
        <input type="submit" value="Save Changes">
    </form>
</body>

</html>
