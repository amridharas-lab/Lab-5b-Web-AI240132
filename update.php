<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<?php
include 'db.php';

// Ambil data lama untuk dipaparkan dalam borang
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Proses kemaskini apabila butang Update ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $update_sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: read.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Update User</h2>
    <form action="update.php" method="POST">
        Matric: <input type="text" name="matric" value="<?php echo $row['matric']; ?>" readonly><br><br>
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Role: 
        <select name="role" required>
            <option value="lecturer" <?php if($row['role'] == 'lecturer') echo 'selected'; ?>>Lecturer</option>
            <option value="student" <?php if($row['role'] == 'student') echo 'selected'; ?>>Student</option>
        </select><br><br>
        <button type="submit">Update</button>
        <a href="read.php">Cancel</a>
    </form>
</body>
</html>