<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $sql = "UPDATE exam SET name=?, date=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . mysqli_error($con);
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'ssi', $name, $date, $id);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt) > 0){
        header("Location: exam.php");
    } else {
        echo "Update failed.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, name, date FROM exam WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . mysqli_error($con);
        exit();
    }
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        echo "Error getting result: " . mysqli_error($con);
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "No exam found with ID: " . $id;
        exit();
    }
} else {
    header("Location: exam.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Exam</title>
</head>
<body>
    <h2>Update Exam</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
