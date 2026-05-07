<!DOCTYPE html>
<html>
<body>
    <h2>Registration Form</h2>
    <form action="insert.php" method="POST">
        Matric: <input type="text" name="matric" required><br>
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>
        Role: 
        <select name="role" required>
            <option value="">Please select</option>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>