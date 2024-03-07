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

//delete Users
function deletUsers($conn,$id){
    // Perform the delete query
    $sql = "DELETE FROM users WHERE uid = $id";

    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Record deleted successfully");window.location.href = "../o2/operations.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//delete customer
function deleteCust($conn,$id){
    // Perform the delete query
    $sql = "DELETE FROM customers WHERE cid = $id";

    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Record deleted successfully");window.location.href = "../o2/view_customer.php"</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//oprations
switch ($_GET['for']) {
    case 'handset':
        deleteHandset($conn, $_GET['id']);
        break;
    case 'hcolor':
        deleteColor($conn, $_GET['id']);
        break;
    case 'pname':
        deletepkg($conn, $_GET['id']);
        break;
    case 'users':
        deletUsers($conn, $_GET['id']);
        break;
    case 'customer':
        deleteCust($conn, $_GET['id']);
        break;
    default:
        // Handle default case if necessary
        break;
}
