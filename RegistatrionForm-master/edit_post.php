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
    $sql_role = "SELECT role FROM users WHERE email = '".$_COOKIE['user']."'";
    $sql_post = "SELECT title, body, author FROM posts WHERE id = ".$post_id;    
    $result_role = $conn->query($sql_role);
    $result_post = $conn->query($sql_post);
    $role = "";
    
    if ($result_role->num_rows > 0) $role = $result_role->fetch_assoc()['role'];
    if ($role == 'administrator'){
        include("edit_page.php");
        while($row = $result_post->fetch_assoc()) {
            echo'<form action="submit_post.php" method="post">'.
                    '<input type="hidden" name="post_id" value="'.$post_id.'">'.
                    '<label for="title">title</label>'.
                    '<input type="text" id="title" name="title" class="form-control mb-4" value="'.$row['title'].'">'.
                    '<label for="author">author</label>'.
                    '<input type="text" id="author" name="author" class="form-control mb-4" value="'.$row['author'].'">'.
                    '<label for="body">body</label>'.
                    '<textarea name="body" id="body" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3">'.$row['body'].'</textarea>'.
                    '<button name="submitPost" class="btn btn-info btn-block" type="submit">Submit</button>'.
                '</form>';
        }
        //$conn->query("DELETE FROM posts WHERE id = ".$post_id);
        //header("Location: home.php");    
    }
    else {
        echo '<div class="login-error">insufficient permissions</div>';
        include("home.php");
    }
}