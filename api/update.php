<?php 
require('db.php');

function update_advisory_record($conn,$custData){
    // Escaping values to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $custData['fname']);
    $lname = mysqli_real_escape_string($conn, $custData['lname']);
    $email = mysqli_real_escape_string($conn, $custData['email']);
    $phone = mysqli_real_escape_string($conn, $custData['phone']);
    $team = mysqli_real_escape_string($conn, $custData['team']);
    $pac = mysqli_real_escape_string($conn, $custData['pac']);
    $agents = mysqli_real_escape_string($conn, $custData['agents']);
    $advisor = mysqli_real_escape_string($conn, $custData['advisor']);
    $listid = mysqli_real_escape_string($conn, $custData['listid']);
    $package_name = mysqli_real_escape_string($conn, $custData['package_name']);
    $handsetname = mysqli_real_escape_string($conn, $custData['handsetname']);
    $hcolor = mysqli_real_escape_string($conn, $custData['hcolor']);
    $dispo = mysqli_real_escape_string($conn, $custData['dispo']);
    $spendcap = mysqli_real_escape_string($conn, $custData['spendcap']);
    $netcomms = mysqli_real_escape_string($conn, $custData['netcomms']);
    $quoteid = mysqli_real_escape_string($conn, $custData['quoteid']);
    $dob = mysqli_real_escape_string($conn, $custData['dob']);
    $outcome = mysqli_real_escape_string($conn, $custData['outcome']);
    $verify = mysqli_real_escape_string($conn, $custData['verify']);
    $cid = mysqli_real_escape_string($conn, $custData['cid']);
    $added_advisor_name = $advisor;
    $advisor_added_date = date('Y-m-d H:i:s');
    
    $update_query = "UPDATE customers SET 
                firstname = '$fname',
                lastname = '$lname',
                email = '$email',
                phone = '$phone',
                team = '$team',
                pac = '$pac',
                agent = '$agents',
                advisor = '$advisor',
                list_id = '$listid',
                package = '$package_name',
                handset = '$handsetname',
                handset_color = '$hcolor',
                select_disposition = '$dispo',
                spend_cap = '$spendcap',
                net_comms = '$netcomms',
                quote_id = '$quoteid',
                dob = '$dob',
                outcome = '$outcome',
                verification = '$verify',
                added_advisor_name = '$added_advisor_name',
                advisor_added_date = '$advisor_added_date'
                WHERE cid = '$cid'";

                if(mysqli_query($conn, $update_query)) {
                    echo "Customer Updated Successfully";
                } else {
                    echo "Error Updating Customer: " . mysqli_error($conn);
                    echo "Query: " . $update_query; // This line will print out the SQL query for debugging
                }

}


//for update from team leaders & managers
function update_tlm_record($conn,$custData){
    // Escaping values to prevent SQL injection
    $fname = mysqli_real_escape_string($conn, $custData['fname']);
    $lname = mysqli_real_escape_string($conn, $custData['lname']);
    $email = mysqli_real_escape_string($conn, $custData['email']);
    $phone = mysqli_real_escape_string($conn, $custData['phone']);
    $team = mysqli_real_escape_string($conn, $custData['team']);
    $pac = mysqli_real_escape_string($conn, $custData['pac']);
    $agents = mysqli_real_escape_string($conn, $custData['agents']);
    $advisor = mysqli_real_escape_string($conn, $custData['advisor']);
    $listid = mysqli_real_escape_string($conn, $custData['listid']);
    $package_name = mysqli_real_escape_string($conn, $custData['package_name']);
    $handsetname = mysqli_real_escape_string($conn, $custData['handsetname']);
    $hcolor = mysqli_real_escape_string($conn, $custData['hcolor']);
    $dispo = mysqli_real_escape_string($conn, $custData['dispo']);
    $spendcap = mysqli_real_escape_string($conn, $custData['spendcap']);
    $netcomms = mysqli_real_escape_string($conn, $custData['netcomms']);
    $quoteid = mysqli_real_escape_string($conn, $custData['quoteid']);
    $dob = mysqli_real_escape_string($conn, $custData['dob']);
    $outcome = mysqli_real_escape_string($conn, $custData['outcome']);
    $cid = mysqli_real_escape_string($conn, $custData['cid']);
    $added_tm_name = mysqli_real_escape_string($conn, $custData['tlm']);
    $tstatus = mysqli_real_escape_string($conn, $custData['tstatus']);
    $cdate = mysqli_real_escape_string($conn, $custData['cdate']);
    $tm_added_date = date('Y-m-d H:i:s');
    
    $update_query = "UPDATE customers SET 
                firstname = '$fname',
                lastname = '$lname',
                email = '$email',
                phone = '$phone',
                team = '$team',
                pac = '$pac',
                agent = '$agents',
                advisor = '$advisor',
                list_id = '$listid',
                package = '$package_name',
                handset = '$handsetname',
                handset_color = '$hcolor',
                select_disposition = '$dispo',
                spend_cap = '$spendcap',
                net_comms = '$netcomms',
                quote_id = '$quoteid',
                dob = '$dob',
                outcome = '$outcome',
                status = '$tstatus',
                connection_date = '$cdate',
                added_tm_m_name = '$added_tm_name',
                tmm_added_date = '$tm_added_date'
                WHERE cid = '$cid'";

                if(mysqli_query($conn, $update_query)) {
                    echo "Customer Updated Successfully";
                } else {
                    echo "Error Updating Customer: " . mysqli_error($conn);
                    echo "Query: " . $update_query; // This line will print out the SQL query for debugging
                }

}

// Check the URL call
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //from advisory
    if(isset($_REQUEST['cid'])){
        $custData = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'team' => $_POST['team'],
            'pac' => $_POST['pac'],
            'agents' => $_POST['agents'],
            'advisor' => $_POST['advisor'],
            'listid' => $_POST['listid'],
            'package_name' => $_POST['package_name'],
            'handsetname' => $_POST['handsetname'],
            'hcolor' => $_POST['hcolor'],
            'dispo' => $_POST['dispo'],
            'spendcap' => $_POST['spendcap'], // Define the 'spendcap' key
            'netcomms' => $_POST['netcomms'], // Define the 'netcomms' key
            'quoteid' => $_POST['quoteid'], // Define the 'quoteid' key
            'dob' => $_POST['dob'],
            'cid' => $_POST['cid'],
            'outcome' => $_POST['outcome'],
            'verify' => $_POST['verify'],
        );

        // Display the data for debugging
        var_dump($custData);

        // Insert the Customer
       // Insert the Customer
        $result = update_advisory_record($conn, $custData);

    } 
    // -----------------------------------------------------------------------------------
    //update from Team Leader & Managera
    elseif(isset($_REQUEST['tcid'])){
        $custData = array(
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'team' => $_POST['team'],
            'pac' => $_POST['pac'],
            'agents' => $_POST['agents'],
            'advisor' => $_POST['advisor'],
            'listid' => $_POST['listid'],
            'package_name' => $_POST['package_name'],
            'handsetname' => $_POST['handsetname'],
            'hcolor' => $_POST['hcolor'],
            'dispo' => $_POST['dispo'],
            'spendcap' => $_POST['spendcap'], // Define the 'spendcap' key
            'netcomms' => $_POST['netcomms'], // Define the 'netcomms' key
            'quoteid' => $_POST['quoteid'], // Define the 'quoteid' key
            'dob' => $_POST['dob'],
            'cid' => $_POST['tcid'],
            'outcome' => $_POST['outcome'],
            'tstatus' => $_POST['tstatus'],
            'cdate' => $_POST['cdate'],
            'tlm' => $_POST['tlm'],
        );

        // Display the data for debugging
        //var_dump($custData);
       // Insert the Customer
       $result = update_tlm_record($conn, $custData);

    } else {
        echo "No CID Provided";
    }

} else {
    echo "Invalid Request Method";
}
