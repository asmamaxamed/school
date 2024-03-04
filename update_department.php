<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, name, location FROM department WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newId = $_POST['new_id'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        $sql = "UPDATE department SET id=?, name=?, location=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'issi', $newId, $name, $location, $id);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt) > 0){
            header("Location: department.php");
        } else {
            echo "Update failed.";
        }
    }
} else {
    header("Location: department.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Department</title>
</head>
<body>
    <h2>Update Department</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="new_id">New ID:</label><br>
        <input type="text" id="new_id" name="new_id" value="<?php echo $row['id']; ?>"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="<?php echo $row['location']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
