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

//delete color
function deleteColor($conn,$id){
    // Perform the delete query
    $sql = "DELETE FROM hcolor WHERE hcid = $id";

    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Record deleted successfully");window.location.href = "../o2/operations.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//delete color
function deletepkg($conn,$id){
    // Perform the delete query
    $sql = "DELETE FROM package WHERE pid = $id";

    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Record deleted successfully");window.location.href = "../o2/operations.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

    //for handset delete
    if($_GET['for']=="handset"){
        deleteHandset($conn,$_GET['id']);

    }elseif($_GET['for']=="hcolor"){
        deleteColor($conn,$_GET['id']);

    }elseif($_GET['for']=="pname"){
        deletepkg($conn,$_GET['id']);

    }