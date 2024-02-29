<?php
// Function to retrieve users from the database with pagination and display them in a table
function displayUsersWithPagination($conn, $limit = 10) {
    
    // Pagination logic
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    // Retrieve users
    $query = "SELECT * FROM customers ORDER BY cid DESC LIMIT $start, $limit";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // Display users in a table
    echo '<div class="table-responsive px-3">';
    echo '<table class="table table-hover bg-light table-bordered mb-3">';
    echo '<thead style="background:#272727;color:#fff">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Customer Name</th>';
    echo '<th>Email</th>';
    echo '<th>Phone</th>';
    echo '<th class="ag">Agent</th>';
    echo '<th class="ag ">Advisor</th>';
    echo '<th class="ag tm ">TM / Managers</th>';
    echo '<th class="ag tm sp">Support</th>';
    echo '<th>View Data</th>';
    echo '<th>Timeline</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $i = 1;
    foreach ($users as $user) {
        echo '<tr style="background: #fff;">';
        echo '<td>' . $i++ . '</td>';
        echo '<td>' . $user['firstname']." ".$user['lastname'] . '</td>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>' . $user['advisor'] . '</td>';
        if($user['agent_name'] != null){
            echo '<td class="ag "> <a href="#" style="background:green" class="text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-check-decagram text-white"></i> &nbsp'.
            $user['agent_name']
            .'</a>
            </td>';
        }else{
            echo '<td class="ag "> <a href="#" class="bg-dark text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-lead-pencil text-white"></i> Edit
            </a>
            </td>';
        }
        if($user['added_advisor_name'] != null){
            echo '<td class="ag "> <a href="#" style="background:green" class="text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-check-decagram text-white"></i> &nbsp'.
            $user['added_advisor_name']
            .'</a>
            </td>';
        }else{
            echo '<td class="ag"> <a href="customer_advisor.php?id='.$user['cid'].'" class="bg-dark text-white px-3 py-1 rounded">
        <i style="color:black; font-size:16px" class="mdi mdi-lead-pencil text-white"></i> Edit
        </a>
        </td>';
        }
        
        if($user['added_tm_m_name'] != null){
            echo '<td class="ag tm "> <a href="#" style="background:green" class="text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-check-decagram text-white"></i> &nbsp'.
            $user['added_tm_m_name']
            .'</a>
            </td>';
        }else{
            echo '<td class="ag tm"> <a href="customer_tm_m.php?id='.$user['cid'].'" class="bg-dark text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-lead-pencil text-white"></i> Edit
            </a>
            </td>';
        }
        echo '<td class="ag ad tm sp"> <a href="customer_tm_m.php?id='.$user['cid'].'" class="bg-dark text-white px-3 py-1 rounded">
            <i style="color:black; font-size:16px" class="mdi mdi-lead-pencil text-white"></i> Edit
            </a>
            </td>';
        echo '<td> <a href="" class="bg-primary text-white px-3 py-1 rounded">
        <i style="color:black; font-size:16px" class="mdi mdi-eye text-white"></i> View
        </a>
        </td>';
        echo '<td> <a href="" class="bg-success text-dark px-3 py-1 rounded">
        <i style="color:black; font-size:16px" class="mdi mdi-timetable text-dark"></i> Timeline
        </a>
        </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // Pagination
    $total_users_query = "SELECT COUNT(*) AS total FROM customers";
    $total_users_result = mysqli_query($conn, $total_users_query);
    $total_users = mysqli_fetch_assoc($total_users_result)['total'];
    $total_pages = ceil($total_users / $limit);

    echo '<ul class="pagination mt-4 px-3">';
    
    // "Start" Link
    echo '<li class="page-item ' . ($page == 1 ? 'disabled' : '') . '">';
    echo '<a class="page-link" href="?page=1">Start</a>';
    echo '</li>';

    // Pagination Numbers
    $range = 3; // Adjust as needed
    $start_range = $page - $range;
    $end_range = $page + $range;
    for ($i = max(1, $start_range); $i <= min($total_pages, $end_range); $i++) {
        echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    // "Last" Link
    echo '<li class="page-item ' . ($page == $total_pages ? 'disabled' : '') . '">';
    echo '<a class="page-link" href="?page=' . $total_pages . '">Last</a>';
    echo '</li>';

    echo '</ul>';

    // Close database connection
    mysqli_close($conn);
}
