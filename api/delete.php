<?php 
require('db.php');
//delete handset
function deleteHandset($conn,$id){
    // Perform the delete query
    $sql = "DELETE FROM handsets WHERE hid = $id";

    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Record deleted successfully");window.location.href = "../o2/operations.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

    //for handset delete
    if($_GET['for']=="handset"){
        deleteHandset($conn,$_GET['id']);
    }