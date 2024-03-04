<?php
include('conn.php');

$sql = "SELECT id, name, email, address FROM teachers"; // Assuming 'address' is the field for teacher's address
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Table</title>
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
    <h2>Teacher Table</h2>
    <br>
    <div style="text-align: center;">
        <a href="add_teacher.php" class="add-button">Add Teacher</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td class='action-links'>
                        <a href='update_teacher.php?id=" . $row['id'] . "' class='update-button'>Update</a> | 
                        <a href='delete_teacher.php?id=" . $row['id'] . "' class='delete-button'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No teacher found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
