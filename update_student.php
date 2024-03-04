<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, name, email, age FROM students WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $sql = "UPDATE students SET name=?, email=?, age=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ssii', $name, $email, $age, $id);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt) > 0){
            header("Location: student.php");
        } else {
            echo "Update failed.";
        }
    }
} else {
    header("Location: student.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <!-- Include CSS styles here -->
</head>
<body>
    <h2>Update Student</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age" value="<?php echo $row['age']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
