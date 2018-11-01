<!--Project Name: Registration Form V1
//Module Name: php7_module
//Programmers: Jacob Taylor, Hermes Mimini, Isaiah Camacho, Isaiah DeBenedetto
//Date: 9/23/18
//Synopsis of php7_module: PHP 7 uses new Zend Engine 3.0 to improve application performance almost twice and 50% better memory consumption than PHP 5.6. It allows to serve more concurrent users without requiring any additional hardware.
//References: https://www.tutorialspoint.com/php7/index.htm, https://www.w3schools.com/php/,
// Welling, L., & Thomson, L. (2008). PHP and MySQL web development (4th ed.). Boston, MA: Addison-Wesley Professional. ISBN-13: 9780672329166-->




<?php

//$hostname = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
//$username = "c6yha5d7xaec2saa";
//$password = "mmz42r0bv1ukt52b";
//$database = "ecdupp1z6rgjtuqa";


////jake's local database
//$hostname = "localhost:8889";
//$username = "root";
//$password = "root";
//$database = "blog";

//establish db connect
$conn = mysqli_connect($hostname, $username, $password, $database);

// isaiah's local database
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "blog";

// Create connection
//$conn = mysqli_connect($user, $password, $db, $host, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection was successfully established!";

$personName = $_POST['fNameInput'];
$personLname = $_POST['lNameInput'];
$personEmail = $_POST['emailInput'];
$personConfirmEmail = $_POST['confirmEmail'];
$personBirthday = $_POST['birthdayInput'];
$personUsername = $_POST['usernameInput'];
$personPassword = $_POST['passwordInput'];
$personConfirmPassword = $_POST['confirmPassword'];


$sql_statement = "INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `confirmEmail`, `birthday`, `username`, `password`, `confirmPassword`) VALUES (NULL, '$personName', '$personLname', '$personEmail', '$personConfirmEmail', '$personBirthday', '$personUsername', '$personPassword', '$personConfirmPassword')";



if($result = $conn->query($sql_statement) == TRUE){
    include "home.php";
    header("Location: home.php");
} 
else {
    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

$conn->close();








