<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$agentname = $_SESSION["firstname"]." ".$_SESSION["lastname"];
require('db.php');

//function for store customer data
function insert_customer_by_agent($custData, $conn,$agentname) {
    
    // Escaping values to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $custData['fname']);
    $lname = mysqli_real_escape_string($conn, $custData['lname']);
    $email = mysqli_real_escape_string($conn, $custData['email']);
    $phone = mysqli_real_escape_string($conn, $custData['phone']);
    $team = mysqli_real_escape_string($conn, $custData['team']);
    $pac = mysqli_real_escape_string($conn, $custData['pac']);
    $agents = mysqli_real_escape_string($conn, $custData['agents']);
    $advisor = mysqli_real_escape_string($conn, $custData['advisor']);
    $listid = mysqli_real_escape_string($conn, $custData['listid']);
    $package_name = mysqli_real_escape_string($conn, $custData['package_name']);
    $handsetname = mysqli_real_escape_string($conn, $custData['handsetname']);
    $hcolor = mysqli_real_escape_string($conn, $custData['hcolor']);
    $dispo = mysqli_real_escape_string($conn, $custData['dispo']);
    $agent_added_date = date('Y-m-d H:i:s');
    $agent_status = "by_agent";
    $agent_name = $agents;
    
    
    // Creating the SQL query
    $query = "INSERT INTO customers (firstname, lastname, email, phone, team, pac, agent, advisor, list_id, package, handset, handset_color, select_disposition, agent_add_cust_date, agent_add_status,agent_name) 
          VALUES ('$fname', '$lname', '$email', '$phone', '$team', '$pac', '$agents', '$advisor', '$listid', '$package_name', '$handsetname', '$hcolor', '$dispo', '$agent_added_date', '$agent_status', '$agent_name')";
    
    // Executing the query
    $result = mysqli_query($conn, $query);
    
    // Checking if the query was successful
    if ($result) {
        return true; // Return true if insertion is successful
    } else {
        // If insertion fails, return the MySQL error
        return mysqli_error($conn);
    }
}

//for data insert

function handsetInsert($conn,$hansetname){
    $date = date('Y-m-d');
    // Creating the SQL query
    $query = "INSERT INTO handsets (handsetname, created_date) 
          VALUES ('$hansetname', '$date')";
    
    // Executing the query
    $result = mysqli_query($conn, $query);
    
    // Checking if the query was successful
    if ($result) {
        return true; // Return true if insertion is successful
    } else {
        // If insertion fails, return the MySQL error
        return mysqli_error($conn);
    }
}

//check the url call by agents login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //for handset
    if($_REQUEST['for']=="handset"){
        $result = handsetInsert($conn,$_POST['hansetname']);
        if ($result === true) {
            echo "Handset Added Successfully";
        } else {
            echo "Error Adding Customer: " . $result;
        }
    }

    //for add customer
    if($_REQUEST['by_agent'] == "add_agent"){
        $custData = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'team' => $_POST['team'],
            'pac' => $_POST['pac'],
            'agents' => $_POST['agents'],
            'advisor' => $_POST['advisor'],
            'listid' => $_POST['listid'],
            'package_name' => $_POST['package_name'],
            'handsetname' => $_POST['handsetname'],
            'hcolor' => $_POST['hcolor'],
            'dispo' => $_POST['dispo']
        );
        // var_dump($custData);
        // Insert the Customer
        $result = insert_customer_by_agent($custData, $conn, $agentname);
        if ($result === true) {
            echo "Customer Added Successfully";
        } else {
            echo "Error Adding Customer: " . $result;
        }
    }
}else{
    echo "error";
}
