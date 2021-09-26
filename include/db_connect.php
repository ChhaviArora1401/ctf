<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register_system";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    printf("Connect failed: ". $connect->connect_error);
    exit();
}
?>