<?php
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
            header("Location: welcome.php");
            exit(); // Ensure that code stops executing after redirection
        }else{
            echo "<div class='alert alert-danger'>
                    Wrong username and/or password
                 </div>";
        }
    }
}
?>