<?php
session_start();
include 'db.php';

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    // 1. Cari user berdasarkan matric
    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // 2. Sahkan password menggunakan password_verify
        if (password_verify($password, $user['password'])) {
            // Jika betul, set session dan redirect ke read.php
            $_SESSION['loggedin'] = true;
            $_SESSION['user_matric'] = $user['matric'];
            header("Location: read.php"); 
        } else {
            $error_message = "Invalid username or password, please <a href='login.php'>login</a> again.";
        }
    } else {
        $error_message = "Invalid username or password, please <a href='login.php'>login</a> again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>
    
    <?php if ($error_message != ""): ?>
        <div style="border: 1px solid red; padding: 10px; color: red; margin-bottom: 10px; width: fit-content;">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        Matric: <input type="text" name="matric" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <p>
         Don't have an account? <a href="register.php">Register here.</a>
    </p>

</body>
</html>
