<?php
// Function to retrieve users from the database with pagination and display them in a table
function displayUsersWithPagination($conn, $limit, $url) {
    
    // Pagination logic
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    // Retrieve users
    $query = "SELECT * FROM customers ORDER BY cid DESC LIMIT $start, $limit";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // Display users in a table
    echo '<div class="table-responsive card mt-3 mx-3">';
    echo '<table class="table table-hover bg-light table-bordered mb-3">';
    echo '<thead">';
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
    echo '<th>Delete</th>';
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
        echo '<td> <button href="" class="bg-danger text-white px-3 py-1 rounded" onclick="confirmDeleteCust('.$user['cid'].')">
        <i style="color:#fff; font-size:16px" class="mdi mdi-account-remove"></i> Delete
        </button>
        </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '<script>
        function confirmDeleteCust(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "'.$url.'/api/delete.php?for=customer&id=" + id;
            }
        }
    </script>';

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


function showHandset($conn,$url){
    $query = "SELECT * FROM handsets ORDER BY hid DESC";
    $result = mysqli_query($conn, $query);
    $handsets = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no=1;
    foreach ($handsets as $handest) {
        echo '<tr>';
        echo '<th scope="row">'.$no++.'</th>';
        echo '<td>'.$handest['handsetname'].'</td>';
        echo '<td><a style="font-size:20px;color:red" href="#" onclick="confirmDeletehs('.$handest['hid'].')"><i class="mdi mdi-playlist-remove"></i></a></td>';
        echo '</tr>';
    }
    // JavaScript function for confirmation
    echo '<script>
    function confirmDeletehs(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "'.$url.'/api/delete.php?for=handset&id=" + id;
        }
    }
    </script>';

}


function showPackage($conn,$url){
    $query = "SELECT * FROM package ORDER BY pid DESC";
    $result = mysqli_query($conn, $query);
    $packages = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no=1;
    foreach ($packages as $package) {
        echo '<tr>';
        echo '<th scope="row">'.$no++.'</th>';
        echo '<td>'.$package['package_name'].'</td>';
        echo '<td><a style="font-size:20px;color:red" href="#" onclick="confirmDeletepkg('.$package['pid'].')"><i class="mdi mdi-playlist-remove"></i></a></td>';
        echo '</tr>';
    }
    // JavaScript function for confirmation
    echo '<script>
    function confirmDeletepkg(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "'.$url.'/api/delete.php?for=pname&id=" + id;
        }
    }
    </script>';

}

function showColors($conn,$url){
    $query = "SELECT * FROM hcolor ORDER BY hcid DESC";
    $result = mysqli_query($conn, $query);
    $colors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no=1;
    foreach ($colors as $color) {
        echo '<tr>';
        echo '<th scope="row">'.$no++.'</th>';
        echo '<td>'.$color['hcolor'].'</td>';
        echo '<td><a style="font-size:20px;color:red" href="#" onclick="confirmDelete('.$color['hcid'].')"><i class="mdi mdi-playlist-remove"></i></a></td>';
        echo '</tr>';
    }
    // JavaScript function for confirmation
    echo '<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "'.$url.'/api/delete.php?for=hcolor&id=" + id;
        }
    }
    </script>';
}

function showUsers($conn,$url){
    $query = "SELECT * FROM users ORDER BY uid DESC";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $no=1;
    foreach ($users as $user) {
        // Declaring Roles
        $role = $user['role'];
        if($role == 1){
            $desg = "Agent";
        }elseif($role == 2){
            $desg = "Advisor";
        }elseif($role == 3){
            $desg = "TL/Manager";
        }elseif($role == 4){
            $desg = "Support";
        }elseif($role == 0){
            $desg = "Admin";
        }
        echo '<tr>';
        echo '<th scope="row">'.$no++.'</th>';
        echo '<td>'.$user['firstname']." ".$user['lastname'].'</td>';
        echo '<td>'.$user['username'].'</td>';
        echo '<td>'.$user['password'].'</td>';
        echo '<td>'.$desg.'</td>';
        echo '<td><a style="font-size:20px;color:red" href="#" onclick="confirmDelete('.$user['uid'].')"><i class="mdi mdi-playlist-remove"></i></a></td>';
        echo '</tr>';
    }
    // JavaScript function for confirmation
    echo '<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "'.$url.'/api/delete.php?for=users&id=" + id;
        }
    }
    </script>';
}


