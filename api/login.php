<?php
include 'db.php';
session_start();
$db = db();
if(isset($_REQUEST['login'])){
    // Define the allowed IP addresses
    $allowed_ips = array("122.170.110.208", "103.211.62.116","192.168.1.61");

    // Get the visitor's IP address
    $visitor_ip = gethostbyname(trim(`hostname`));
    echo $visitor_ip;

    // Check if the visitor's IP address is in the allowed list
    if(!in_array($visitor_ip, $allowed_ips)) {
        // IP address not allowed, display an error message
        echo "Access Denied. Your IP address is not allowed to access this website.";
        exit;
    } else {
        $username = $_REQUEST['loginid'];
        $password = $_REQUEST['password'];
        // Query database
        $sql = "SELECT uid,firstname,lastname, username, password,role FROM users WHERE username = ? LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists and password is correct
        if ($result->num_rows == 1) {
            
            $row = $result->fetch_assoc();
           // echo $password;
            if ($password == $row["password"]) {
                // Set session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["role"] = $row["role"];
                //echo $row["username"];
                // Redirect user to welcome page
               header("location: ../o2/dashboard.php");
                exit;
            }else{
                header("location: ../index.php?status=err");
            }
        }
        
        $db->close();
    }
}
?>
