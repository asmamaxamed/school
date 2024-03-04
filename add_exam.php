<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $sql = "INSERT INTO exam (id,name, date) VALUES ('$id','$name', '$date')";
    mysqli_query($con, $sql);
    header("Location: exam.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exam</title>
</head>
<body>
    <h2>Add Exam</h2>
    <form method="post">
    <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
