<?php require('../api/sessions.php') ?>
      <!-- partial:partials/_sidebar.html -->
      <title>Support - Customer Stage IV</title>
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
                    <p class="m-0 pr-3">Support - Customer Stage IV</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0"></p>
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
                            <input type="text" value="<?php echo $cust['quote_id'] ?>" name="quoteid" class="form-control" id="quoteid"  placeholder="Enter Quote ID">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Spend Cap</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">£</span>
                                </div>
                                <input type="number" class="form-control" value="<?php echo $cust['spend_cap'] ?>" id="spendcap" name="spendcap">
                                <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                                </div>
                            </div>
                               
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Net Comms.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">£</span>
                                </div>
                                <input type="number" class="form-control" value="<?php echo $cust['net_comms'] ?>" name="netcomms" id="netcomms">
                                <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Date of Birth.</label>
                            <input type="date" name="dob" value="<?php echo $cust['dob'] ?>" class="form-control" id="dob"  placeholder="Enter Net Comms.">
                        </div>
                    </div>
            
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Outcome</label>
                            <select class="form-control" name="outcome" id="outcome">
                                <option selected value="<?php echo $cust['outcome'] ?>"><?php echo $cust['outcome'] ?></option>
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
                            <input type="text" name="verify" value="<?php echo $cust['verification'] ?>" class="form-control" id="verify" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2 mb-4">
                        <hr>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="tstatus" value="<?php echo $cust['status'] ?>" class="form-control" id="tstatus" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Connection Date</label>
                            <input type="date" name="cdate" class="form-control" id="cdate" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Team Leader/Manager</label>
                            <input type="text" value="<?php echo $firstname." ".$lastname; ?>" name="tlm" class="form-control" id="tlm" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group pt-2">
                            <input type="hidden" name="tcid" value="<?php echo $cid; ?>">
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
    function submitFormData() {
        event.preventDefault();
        
        // Show loader
        $("#loader").show();

        var formData = new FormData(document.getElementById("advForm"));

        // Show SweetAlert with loading state
        Swal.fire({
            title: 'Processing...',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            type: "POST",
            url: "<?php echo $url; ?>/api/update.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Hide loader
                $("#loader").hide();

                // Close SweetAlert
                Swal.close();

                // Show success alert
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response,
                }).then((result) => {
                    // Redirect to another page after the user clicks "OK" on the success alert
                    if (result.isConfirmed) {
                        window.location.href = "view_customer.php"; // Change the URL to your desired redirect destination
                    }
                });
            },
            error: function(xhr, status, error) {
                // Hide loader
                $("#loader").hide();

                // Close SweetAlert
                Swal.close();

                // Show error alert
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error occurred while submitting data: ' + error,
                });
            }
        });
    }
</script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>