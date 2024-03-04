<?php
include('conn.php');
session_start();

if(isset($_POST['login_btn'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($password == "" || $username == ""){
        echo "<div class='alert alert-danger'>
                Please fill in all fields
                </div>";
    }else{
        $sql = "SELECT * FROM users 
                WHERE username = '$username' 
                AND password = '$password' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1){
            $_SESSION["username"] = $username;
            // Redirect to another page
            header("Location: dashboard1.php");
            exit(); // Ensure that code stops executing after redirection
        }else{
            echo "<div class='alert alert-danger'>
                    Wrong username and/or password
                 </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <button type="submit" name="login_btn">Login</button>
        </form>
    </div>
</body>
</html>
