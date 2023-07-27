<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "appointment");

// Create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$mobileno = $_POST['mobile'];
$email = $_POST['mailid'];
$patientname = $_POST['pname'];
$patientgender = $_POST['pgender'];
$patientage = $_POST['page'];
$doctor = $_POST['doc'];

// Properly quote the values in the query
$qry = "INSERT INTO appointmentdetails1 VALUES ('$name', '$mobileno', '$email', '$patientname', '$patientgender', '$patientage', '$doctor')";
$conn->query($qry);


header("Location: index.html");

$conn->close();
?>
