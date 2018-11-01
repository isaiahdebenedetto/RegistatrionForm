<?php

//isaiah's local database
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "blog";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// declare variables from form
$post_id = $_POST['post_id'];

// delete post if user cookie is set
if(!isset($_COOKIE['user'])) {
    echo '<div class="login-error">insufficient permissions</div>';
    include("home.php");
}
else {
    $sql = "SELECT role FROM users WHERE email = '".$_COOKIE['user']."'";
    $result = $conn->query($sql);
    $role = "";
    
    if ($result->num_rows > 0) $role = $result->fetch_assoc()['role'];
    if ($role == 'administrator'){
        $conn->query("DELETE FROM posts WHERE id = ".$post_id);
        header("Location: home.php");    
    }
    else {
        echo '<div class="login-error">insufficient permissions</div>';
        include("home.php");
    }
}