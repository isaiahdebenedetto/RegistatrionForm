<?php

//jake's local database
//$hostname = "localhost:8889";
//$username = "root";
//$password = "root";
//$database = "blog";

//$hostname = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
//$username = "c6yha5d7xaec2saa";
//$password = "mmz42r0bv1ukt52b";
//$database = "ecdupp1z6rgjtuqa";

//isaiah's local database
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "blog";

//establish db connect
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$postTitle = $_POST['title'];
$postBody = $_POST['body'];
$authorName = $_POST['author'];

$sql_statement = "INSERT INTO posts (id, title, body, author) VALUES (NULL, '$postTitle', '$postBody', '$authorName')";


if($conn->query($sql_statement) == TRUE){
    include "home.php";
    header("Location: home.php");

} else{

    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

define ('ROOT_PATH', realpath(dirname(__FILE__)));

$conn->close();
