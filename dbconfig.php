<?php


        //
        // NEW MYSQLI(MySQL improved) METHODS
        //
        // In this simple example we use the new mysqli functions.
        // These are a set of new commands added in newer versions 
        // of PHP.  Values for product_name are called table products.
        //

// 1- Connect to the database using mysqli
//        $db_host = "localhost";
//        $db_user = "root";
//        $db_password = "root";
//        $db_name = "Micro-blog";
//        $db_link = mysqli_connect($db_host, $db_user, $db_password ,$db_name) or die("Unable to connect to DB: " . mysqli_connect_error ());
      
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Micro-blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
    session_start();
}
       


?>