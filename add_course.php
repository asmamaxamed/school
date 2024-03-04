<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id =  $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO courses (id,name, description) VALUES ($id,'$name', '$description')";
    mysqli_query($con, $sql);
    header("Location: course.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>
    <h2>Add Course</h2>
    <form method="post">
    <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description"><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
