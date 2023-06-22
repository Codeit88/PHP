<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "techmaze";


$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) echo "Error Connecting";
?>
