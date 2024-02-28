<title>Add Customer - Customer Stage</title>
      <!-- partial:partials/_sidebar.html -->
      <?php require('sidebar.php'); ?>
      <!-- partial -->
      
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
                    <p class="m-0 pr-3">Agent - Add Customer</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                
              </div>
            </div>
            <!-- first row starts here -->
            <div class="container card py-5 px-4 mb-5 mt-2">
            <form id="yourFormId" >
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" id="fname"  placeholder="Enter Fist Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lname"  placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Customer's Email</label>
                            <input type="email" name="email" class="form-control" id="email"  placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Customer's Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone"  placeholder="Enter Phone No">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Team</label>
                            <select class="form-control" name="team" id="team">
                                <option Selected>Select Team</option>
                                <option value="T1">T1</option>
                                <option value="T2">T2</option>
                                <option value="T3">T3</option> 
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Enter PAC <small>(ABC123456)</small></label>
                            <input type="text" name="pac" class="form-control" id="pac"  placeholder="ABC123456">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Agent</label>
                            <?php selectusers(1,'agents',null,null); ?>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Advisor</label>
                            <?php selectusers(2,'advisor',null,null); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>List ID</label>
                            <input type="text" name="listid" class="form-control" id="lsitid"  placeholder="1234">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                                <label>Package</label>
                            <?php selectinput('package_name','package',null); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Handset</label>
                            <?php selectinput('handsetname','handsets',null); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Color</label>
                            <?php selectinput('hcolor','hcolor',null); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Select Disposition</label>
                            <select class="form-control" name="dispo" id="dispo">
                                <option Selected>Select Disposition</option>
                                <option value="Call Transferred">Call Transferred</option>
                                <option value="Failed Transfer">Failed Transfer</option>
                            </select>    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mt-2">
                        <label></label>
                            <input type="hidden" name="by_agent" value="add_agent">
                            <button onclick="submitFormData(event)" class="form-control btn-sm py-2 mt-1 px-4 btn-primary mb-2 mb-md-0 mr-2"> Add Record </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
         </div>

         <!-- Include jQuery from CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // JavaScript function to send form data via AJAX
    function submitFormData(event) {
        // Prevent default form submission behavior
        event.preventDefault();
        
        // Get form data
        var formData = new FormData(document.getElementById("yourFormId")); // Replace "yourFormId" with the actual ID of your form

        // Perform validation for all fields
        var isValid = true;
        formData.forEach(function(value, key) {
            if (value.trim() === "") {
                isValid = false;
                return;
            }
        });

        if (!isValid) {
            // Show validation error using SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'All fields are required',
            });
            return; // Exit function if validation fails
        }

        // AJAX request
        $.ajax({
            type: "POST",
            url: "http://localhost/o2crm/plus-admin/api/insert.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success response
                console.log("Data submitted successfully: " + response);
                // Show success message using SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data submitted successfully',
                });
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error("Error occurred while submitting data:", error);
                // Show error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error occurred while submitting data',
                });
            }
        });
    }
</script>


          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>