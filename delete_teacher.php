<?php
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM teachers WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    if(mysqli_stmt_affected_rows($stmt) > 0){
        header("Location: teacher.php");
    } else {
        echo "Delete failed.";
    }
} else {
    header("Location: teacher.php");
}
?>
