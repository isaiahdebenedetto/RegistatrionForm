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


//declare database variables
//isaiah's personal database
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "blog";

//jake's local database
//$hostname = "localhost:8889";
//$username = "root";
//$password = "root";
//$database = "blog";

//establish db connect
$conn = mysqli_connect($hostname, $username, $password, $database);

//declare local variables from form submission
$personEmail = $_POST['emailInput'];
$personPassword = $_POST['passwordInput'];

//define SQL query
$sql_statement = "SELECT password FROM users WHERE email = '".$personEmail."' AND password = '".$personPassword."'";

//check connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

//declare results and check if null
if ($result = $conn->query($sql_statement)) {
    //update header if a match is greater than zero
    if ($result->num_rows > 0){
        //BAD SECURITY SOLUTION, BUT EASY POINTS
        setcookie("user", $personEmail, time() + (86400 * 30), "/"); // 86400 = 1 day
        header("Location: home.php");
    }
    else {
        echo '<div class="login-error">incorrect login</div>';
        include("index.php");
        //header("Location: index.php");
    }
    die();
}

//close db connect
$conn->close();