<!DOCTYPE html>
<html>
<head>
    <title>Update Teacher</title>
    <!-- Include CSS styles here -->
</head>
<body>
    <h2>Update Teacher</h2>
    <?php
    include('conn.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id, name, email, address FROM teachers WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $sql = "UPDATE teachers SET name=?, email=?, address=? WHERE id=?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $address, $id);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_affected_rows($stmt) > 0){
                header("Location: teacher.php");
            } else {
                echo "Update failed.";
            }
        }
    } else {
        header("Location: teachers.php");
    }
    ?>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
