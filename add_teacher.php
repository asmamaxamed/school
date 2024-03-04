<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address']; // Assuming the column name is 'address' for teacher's address
    $sql = "INSERT INTO teachers (id, name, email, address) VALUES ('$id', '$name', '$email', '$address')";
    mysqli_query($con, $sql);
    header("Location: teacher.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>
    <h2>Add Teacher</h2>
    <form method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>
