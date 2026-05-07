<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<?php
include 'db.php';

$matric = $_POST['matric'];
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Simpan password secara selamat
$role = $_POST['role'];

$sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Data berjaya disimpan! <a href='read.php'>Lihat Senarai</a>";
} else {
    echo "Ralat: " . $conn->error;
}
$conn->close();
?>