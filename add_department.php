<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $sql = "INSERT INTO department (id, name, location) VALUES ('$id', '$name', '$location')";
    mysqli_query($con, $sql);
    header("Location: department.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
</head>
<body>
    <h2>Add Department</h2>
    <form method="post">
    <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location"><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
