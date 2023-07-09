<?php
include 'connection.php';
session_start();
$showow = false;
$show_not = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $my_id = $_SESSION['user_id'];
    $user = $_POST['contname'];
    $number = $_POST['number'];
    $sql = "SELECT id FROM users WHERE name='$user' AND phone_number='$number'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foundId = $row['id'];

        $add = "INSERT INTO `contacts` (`user_id`, `his_cont`) VALUES ('$my_id', '$foundId')";
        $exec = mysqli_query($conn, $add);
        if ($exec)
            $showow = true;
        else
            $show_not = true;
    } else {
        $show_not = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Contacts</title>
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

        .form {
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


        .form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form input[type="text"],
        .form input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .form input[type="text"]:focus,
        .form input[type="tel"]:focus {
            outline: none;
            border-color: #128C7E;
            box-shadow: 0 0 5px rgba(18, 140, 126, 0.3);
        }

        .form input[type="submit"] {
            background-color: #128C7E;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form input[type="submit"]:hover {
            background-color: #075E54;
        }
    </style>
</head>

<body>

    <?php
    if ($showow) {
        echo '<div class="container mt-4">
        <div class="custom-alert alert alert-success" role="alert">
         
            <p>Contact Added.</p>
        </div>
    </div>';
    }
    if ($show_not) {
        echo '<div class="container mt-4">
        <div class="custom-alert2 alert alert-danger" role="alert">
            <h4 class="alert-heading">Sorry!</h4>
            <p>Incorrect data. Not Added</p>
        </div>
    </div>';
    }
    ?>



    <div class="form">
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" id='contname' name='contname' class="contname" placeholder="Enter the Contact Name">

            <label for="Number">Number</label>
            <input type="tel" id='number' name='number' class="number" placeholder="Enter Contact">

            <input type="submit" id="submitcont">
        </form>
    </div>
</body>

</html>