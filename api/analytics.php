<?php
require('db.php');

// User-provided year parameter
$user_year = "2024";

// SQL query
$sql = "SELECT 
            EXTRACT(MONTH FROM agent_add_cust_date) AS month,
            DATE_FORMAT(agent_add_cust_date, '%M') AS month_name,
            COUNT(DISTINCT cid) AS total_customers
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
$stmt->bind_param("i", $user_year);

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

// Close connection
$conn->close();

// Convert the results to JSON format
echo json_encode($results);
?>
