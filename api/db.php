<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
function db() {
    // Attempt to connect to the database
    $conn = mysqli_connect("localhost", "doodlueg_leadflow", "leadflow@2024", "doodlueg_leadcrm");

    // Check connection
    if (!$conn) {
        // If connection fails, handle the error
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

// Call the db function to establish a connection
$conn = db();

?>

