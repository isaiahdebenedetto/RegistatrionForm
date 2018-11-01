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
$post_title = $_POST['title'];
$post_body = $_POST['body'];
$post_author = $_POST['author'];

// delete post if user cookie is set
if(!isset($_COOKIE['user'])) {
    echo '<div class="login-error">insufficient permissions</div>';
    include("home.php");
}
else {
    
    $sql_role = "SELECT role FROM users WHERE email = '".$_COOKIE['user']."'";
    $sql_post = "UPDATE posts SET title = '".$post_title."', body = '".$post_body."', author = '".$post_author."' WHERE id = '".$post_id."'";
    $result_role = $conn->query($sql_role);
    //$result_post = $conn->query($sql_post);
    $role = "";
    
    if ($result_role->num_rows > 0) $role = $result_role->fetch_assoc()['role'];
    if ($role == 'administrator'){
        if ($conn->query($sql_post) === TRUE) {
            //include("home.php");  
            header('Location: home.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    else {
        echo '<div class="login-error">insufficient permissions</div>';
        include("home.php");
    }
}