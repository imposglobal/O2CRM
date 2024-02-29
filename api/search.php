<?php 
require('db.php');

function search_customer($conn, $input){
    $sql = "SELECT * FROM customers WHERE email='$input' OR phone='$input'";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists and password is correct
        if ($result->num_rows == 1) {
            echo"Found";
        }else{
            echo"Not Found";
        }
        search_customer($conn, 'doodlodesign@gmail.com');
}