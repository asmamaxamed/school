<?php
include('conn.php');

$sql = "SELECT id, name, email, age FROM students";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Table</title>
    <!-- Include CSS styles here -->
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 10px;
    text-align: left;
}

.action-links {
    text-align: center;
}

.add-button {
    display: inline-block;
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.add-button:hover {
    background-color: #0056b3;
}

.update-button {
    display: inline-block;
    background-color: green;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 10px;
}

.delete-button {
    display: inline-block;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px 10px;
}

    </style>
</head>
<body>
    <h2>Student Table</h2>
    <br>
    <div style="text-align: center;">
        <a href="add_student.php" class="add-button">Add Student</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td class='action-links'>
            <a href='update_student.php?id=" . $row['id'] . "' class='update-button'>Update</a> | 
            <a href='delete_student.php?id=" . $row['id'] . "' class='delete-button'>Delete</a>
        </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No students found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
