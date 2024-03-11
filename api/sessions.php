<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
     ob_start();
 } 
 require('db.php');
 require('functions.php');
 require('view.php');
// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}

// Access session variables
$userId = $_SESSION["uid"];
$username = $_SESSION["username"];
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];
$role = $_SESSION["role"];
?>