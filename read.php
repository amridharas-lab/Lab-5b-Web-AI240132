<?php
session_start();
if (!isset($_SESSION['loggedin'])) { 
    header('Location: login.php'); 
    exit; 
}
include 'db.php';

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        table { border-collapse: separate; border-spacing: 2px; border: 1px solid black; width: 60%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { font-weight: bold; }
    </style>
</head>
<body>
    <p align="right"><a href="logout.php">Logout</a></p>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th> 
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['matric']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><a href="update.php?matric=<?php echo $row['matric']; ?>">Update</a></td>
            <td><a href="delete.php?matric=<?php echo $row['matric']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
