<?php 
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow the following HTTP methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Allow the following headers
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


// Include your database connection file (db.php)
require('db.php');

// Check if the 'id' parameter is set in the request
if(isset($_REQUEST['cid'])){
    // Sanitize the input (assuming 'id' is an integer)
    $id = $_REQUEST['cid'];
    
    // Execute the SQL query to fetch data based on the provided id
    $sql = "SELECT 
    firstname as First_Name,
    lastname as Last_Name,
    email as Email,
    phone as Phone,
    team as Team,
    pac as PAC,
    agent as Agent,
    advisor as Advisor,
    list_id as List_ID,
    package as Package,
    handset as Handset,
    handset_color as Handset_Color,
    select_disposition as Disposition,
    quote_id as Quote_ID,
    spend_cap as Spend_CAP,
    net_comms as Net_Comms,
    dob as Date_of_Birth,
    outcome as Outcome,
    verification as Verification,
    status as Status,
    connection_date as Connection_Date,
    support_agent as Support_Agent,
    customer_query as Customer_Query
     FROM customers WHERE cid = $id";
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
