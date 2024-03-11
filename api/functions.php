<?php 
function selectusers($usertype,$name,$agent,$verification){
    $conn = db();
    if($verification == null){
        $sql = "SELECT uid, username FROM users WHERE role='$usertype'";
    }else{
          // SQL query to fetch data from the user table
    $sql = "SELECT uid, username FROM users WHERE role='$usertype' AND verifier='$verification'";
    }
      

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row as select options
        echo '<select class="form-control" name="'.$name.'" id="'.$name.'">';
        if($agent == null) {
            echo '<option selected>Please Select</option>';   
        }else{
            echo "<option value='" . $agent . "'>" . $agent . "</option>";
        }
        
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["firstname"] . $row["lastname"] . "'>" . $row["fisrtname"] . $row["lastname"] . "</option>";
        }
        echo "</select>";
    } else {
        echo '<select class="form-control" name="'.$name.'" id="'.$name.'">';
            echo "<option>Not Found</option>";
        echo "</select>";
    }

}

function selectinput($package,$table,$pkgname){
    $conn = db();
        // SQL query to fetch data from the user table
    $sql = "SELECT ".$package." FROM "."$table";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Output data of each row as select options
        echo '<select class="form-control" name="'.$package.'" id="'.$package.'">';
        if($pkgname == null) {
            echo '<option selected>Please Select</option>';
        }else{
            echo "<option value='" . $pkgname . "'>" . $pkgname . "</option>";
        }
        
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row[$package] . "'>" . $row[$package] . "</option>";
        }
        echo "</select>";
    } else {
        echo '<select class="form-control" name="'.$package.'" id="'.$package.'">';
            echo "<option>Not Found</option>";
        echo "</select>";
    }

}


//total working days
function getTotalWorkingDaysCurrentMonth() {
    $working_days = 0;
    $current_month = date('m');
    $current_year = date('Y');
    $total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

    for ($day = 1; $day <= $total_days_in_month; $day++) {
        $current_date = mktime(0, 0, 0, $current_month, $day, $current_year);
        // Check if the current day is not a weekend (Saturday or Sunday)
        if (date('N', $current_date) < 6) {
            $working_days++;
        }
    }

    return $working_days;
}


//days to go 
function getWorkingDaysToGo() {
    $working_days = 0;
    $current_day = date('j');
    $current_month = date('n');
    $current_year = date('Y');
    $total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

    for ($day = $current_day; $day <= $total_days_in_month; $day++) {
        $current_date = mktime(0, 0, 0, $current_month, $day, $current_year);
        // Check if the current day is not a weekend (Saturday or Sunday)
        if (date('N', $current_date) < 6) {
            $working_days++;
        }
    }

    return $working_days;
}
function baseurl(){
    // Program to display URL of current page.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else
  $link = "http";
 
// Here append the common URL characters.
$link .= "://";
 
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
 

 
// Print the link
return $link;
}




