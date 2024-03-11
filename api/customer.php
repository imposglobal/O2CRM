<?php 
// Include your database connection file (db.php)
require('db.php');

// Check if the 'id' parameter is set in the request
if(isset($_REQUEST['cid'])){
    // Sanitize the input (assuming 'id' is an integer)
    $id = $_REQUEST['cid'];
    
    // Execute the SQL query to fetch data based on the provided id
    $sql = "SELECT * FROM customers WHERE cid = $id";
    $result = mysqli_query($conn, $sql);

    // Fetch the data
    $data = mysqli_fetch_assoc($result);

    //Check if data is found
    if ($data) {
        // Return the data as JSON
        echo json_encode($data, JSON_PRETTY_PRINT);
        // Set HTTP response code to 200 (OK)
        http_response_code(200);
    } else {
        // No data found, return a message
        echo json_encode([
            "message" => "No data found for the provided ID"
        ]);
        // Set HTTP response code to 404 (Not Found)
        http_response_code(404);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // 'id' parameter is not set, return a message
    echo json_encode([
        "message" => "No ID parameter provided"
    ]);
    // Set HTTP response code to 400 (Bad Request)
    http_response_code(400);
}
?>
