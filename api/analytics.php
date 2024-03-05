<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$role = $_SESSION["role"];
$agentname = $_SESSION["firstname"]." ".$_SESSION["lastname"];
require('db.php');
// Function to fetch customer analytics
function customerAnalytics($conn, $year){
    // SQL query for customers
    $sql = "SELECT 
                EXTRACT(MONTH FROM agent_add_cust_date) AS month,
                DATE_FORMAT(agent_add_cust_date, '%M') AS month_name,
                COUNT(DISTINCT cid) AS total_customers
            FROM 
                customers
            WHERE 
                YEAR(agent_add_cust_date) = '$year'
            GROUP BY 
                EXTRACT(MONTH FROM agent_add_cust_date),
                DATE_FORMAT(agent_add_cust_date, '%M')
            ORDER BY 
                EXTRACT(MONTH FROM agent_add_cust_date)";

    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $results = []; // or handle the error
    }
    
    // Return results
    return $results;
}


// Function to fetch conversion analytics
function conversionAnalytics($conn, $year){
    // SQL query for conversions
    $sql = "SELECT 
                EXTRACT(MONTH FROM agent_add_cust_date) AS month,
                DATE_FORMAT(agent_add_cust_date, '%M') AS month_name,
                COUNT(*) AS total_conversions
            FROM 
                customers
            WHERE 
                YEAR(agent_add_cust_date) = ?
            GROUP BY 
                EXTRACT(MONTH FROM agent_add_cust_date),
                DATE_FORMAT(agent_add_cust_date, '%M')
            ORDER BY 
                EXTRACT(MONTH FROM agent_add_cust_date)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("i", $year);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the results
    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    // Close statement
    $stmt->close();

    // Return results
    return $results;
}

// User-provided year parameter
$user_year = "2024";

// Fetch customer analytics
$customerData = customerAnalytics($conn, $user_year);

// Fetch conversion analytics
$conversionData = conversionAnalytics($conn, $user_year);

// Close connection
$conn->close();

// Combine both results
$result = [
    'customers' => $customerData,
    'conversions' => $conversionData
];

// Convert the combined results to JSON format
echo json_encode($result);
?>
