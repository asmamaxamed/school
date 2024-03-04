<?php

$host = "localhost"; // DB IP address
$username = "asma"; // DB user
$password = "Abc123@@"; // DB password
$database = "school_db"; // Specific database to connect to

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    // If the connection failed
    die("The connection to the database failed: " . mysqli_connect_error());
}



?>