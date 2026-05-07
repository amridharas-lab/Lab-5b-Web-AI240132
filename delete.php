<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<?php
include 'db.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    $sql = "DELETE FROM users WHERE matric = '$matric'";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php"); // Kembali ke senarai selepas padam
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>