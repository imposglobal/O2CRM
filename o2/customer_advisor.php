
      <!-- partial:partials/_sidebar.html -->
      <title>Advisor - Customer Stage II</title>
      <?php require('sidebar.php'); ?>
      <!-- partial -->
      <?php 
      // Retrieve customer
      $cid = $_REQUEST['id'];
        $query = "SELECT * FROM customers WHERE cid='$cid'";
        $result = mysqli_query($conn, $query);
        $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($customer as $cust) {
      ?>
      
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 mr-2"> My Analytics </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
              </div>
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                    <p class="m-0 pr-3">Advisor - Customer Stage II</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                
              </div>
            </div>
            <!-- first row starts here -->
            <div class="container card py-5 px-4 mb-5 mt-2">
                <form id="advForm">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" value="<?php echo $cust['firstname'] ?>" name="fname" class="form-control" id="fname"  placeholder="Enter Fist Name" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" value="<?php echo $cust['lastname'] ?>" name="lname" class="form-control" id="lname"  placeholder="Enter Last Name" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Customer's Email</label>
                            <input type="email" name="email" value="<?php echo $cust['email'] ?>" class="form-control" id="email"  placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Customer's Phone</label>
                            <input type="text" name="phone" value="<?php echo $cust['phone'] ?>" class="form-control" id="email"  placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Team</label>
                            <select class="form-control" name="team" id="team">
                                <option value= "<?php echo $cust['team'] ?>"><?php echo $cust['team'] ?></option>
                                <option value="T1">T1</option>
                                <option value="T2">T2</option>
                                <option value="T3">T3</option> 
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Enter PAC <small>(ABC123456)</small></label>
                            <input type="text" name="pac" value="<?php echo $cust['pac'] ?>" class="form-control" id="pac"  placeholder="ABC123456">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Agent</label>
                            <?php selectusers(1,'agents',$cust['agent'],null); ?>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Advisor</label>
                            <?php selectusers(2,'advisor',$cust['advisor'],null); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>List ID</label>
                            <input type="text" value="<?php echo $cust['list_id'] ?>" name="listid" class="form-control" id="lsitid"  placeholder="1234">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Package</label>
                            <?php selectinput('package_name','package',$cust['package']); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Handset</label>
                            <?php selectinput('handsetname','handsets',$cust['handset']); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Color</label>
                            <?php selectinput('hcolor','hcolor',$cust['handset_color']); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Select Disposition</label>
                            <select class="form-control" name="dispo" id="dispo">
                                <option selected value="<?php echo $cust['select_disposition'] ?>"><?php echo $cust['select_disposition'] ?></option>
                                <option value="Call Transferred">Call Transferred</option>
                                <option value="Failed Transfer">Failed Transfer</option>
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2 mb-4">
                        <hr>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Quote ID</label>
                            <input type="text" name="quoteid" class="form-control" id="quoteid"  placeholder="Enter Quote ID">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Spend Cap</label>
                            <input type="text" name="spendcap" class="form-control" id="spendcap"  placeholder="Spend Cap">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Net Comms.</label>
                            <input type="text" name="netcomms" class="form-control" id="netcomms"  placeholder="Enter Net Comms.">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Date of Birth.</label>
                            <input type="date" name="dob" class="form-control" id="dob"  placeholder="Enter Net Comms.">
                        </div>
                    </div>
            
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Outcome</label>
                            <select class="form-control" name="outcome" id="outcome">
                                <option selected>Please Select</option>
                                <option value="Not Interested">Not Interested</option>
                                <option value="Sale Completed">Sale Completed</option>
                                <option value="Pending">Pending</option>
                                <option value="DNC">DNC</option>
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Verification Done By</label>
                            <?php selectusers(2,'verify',null,1); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group pt-2">
                            <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                            <button onclick="submitFormData()" class="form-control mt-4 btn-sm py-2 px-4 btn-primary mb-2 mb-md-0 mr-2">Add Record</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
         </div>
           <?php }?>
            <!-- Include jQuery from CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // JavaScript function to send form data via AJAX
    function submitFormData() {
        // Prevent default form submission behavior
        event.preventDefault();

        // Perform field validation
        var isValid = true;
        $('#advForm input, #advForm select').each(function() {
            if ($(this).val().trim() === '') {
                isValid = false;
                return false; // Exit the loop early if any field is empty
            }
        });

        if (!isValid) {
            // Show Sweet Alert for validation error
            Swal.fire(
                'Validation Error!',
                'Please fill in all required fields.',
                'error'
            );
            return;
        }

        // Show Sweet Alert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to add a record. Do you want to proceed?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Get form data
                var formData = new FormData(document.getElementById("advForm"));
                console.log(formData);
                // AJAX request
                $.ajax({
                    type: "POST",
                    url: "http://localhost/o2crm/api/update.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success response
                        console.log("Data submitted successfully: " + response);
                        // Show success message
                        Swal.fire(
                            'Success!',
                            'Record has been added successfully.',
                            'success'
                        ).then((result) => {
                            // Redirect to another page
                            window.location.href = "view_customer.php";
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error("Error occurred while submitting data:", error);
                        // Show error message
                        Swal.fire(
                            'Error!',
                            'An error occurred while adding the record.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>