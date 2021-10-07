<?php
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$username = $_REQUEST['username'];
$emailAddress = $_REQUEST['email'];
$password = $_REQUEST['password'];


require_once("config.php");

$connection = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE)
    or die("strong style=\"color: red;\"> Could not connect to database!</strong>");

$query = mysqli_query($connection,"INSERT INTO details (firstName, lastName, username, email, password)
VALUES  ('$firstName', '$lastName', '$username', '$emailAddress', '$password')")
or die("strong style=\"color: red;\"> Could not execute query!</strong>");

echo "succefully registered!";
    
mysqli_close($connection);

?>