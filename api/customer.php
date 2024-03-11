<?php 
// Include your database connection file (db.php)
require('db.php');

// Check if the 'id' parameter is set in the request
    // Sanitize the input (assuming 'id' is an integer)
    $id = '9';
    
    // Execute the SQL query to fetch data based on the provided id
    $sql = "SELECT * FROM `customers` WHERE cid = 9;";
    $result = mysqli_query($conn, $sql);

    // Fetch the data
    $data = mysqli_fetch_assoc($result);

   print_r($data);
   

