<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "Lab5b_web";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Sambungan gagal: " . $conn->connect_error);
}
?>