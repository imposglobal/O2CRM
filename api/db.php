<?php
function db () {
    $conn = mysqli_connect ("localhost", "root", "", "o2plan");
    return $conn;
    }
    $conn = db();
?>
