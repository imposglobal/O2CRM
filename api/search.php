<?php 
require('db.php');

function search_customer($db, $input){
    $sql = "SELECT * FROM customers WHERE email='$input' OR phone='$input'";
       // Executing the query
        $result = mysqli_query($db, $sql);
    
        // Check if user exists and password is correct
        if ($result->num_rows == 1) {
            echo"Duplicate Customer Found";
        }else{
            echo"No Duplicate Customer Found";
        }
        
}
if(isset($_POST['id'])){
    search_customer($conn, trim($_POST['id']));
}
