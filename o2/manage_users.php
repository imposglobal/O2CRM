<?php require('../api/sessions.php') ?>
<title>Manage Users</title>
<style>
    span#result {
    font-size: 12px;
    background: #0033c4;
    color: #fff;
    padding: 2px 10px;
}
table {
  width: 100% !important;
}
.theight{
    height: auto;
    overflow: auto;
    max-height: 280px;
}
::-webkit-scrollbar{
        height: 4px;
        width: 4px;
        background: gray;
    }
    ::-webkit-scrollbar-thumb:horizontal{
        background: #272727;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:vertical{
        background: #272727;
        border-radius: 10px;
    }
</style>
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
                    <p class="m-0 pr-3">Operations</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">Manage Users</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Select Options</label>
                        <select class="form-control" id="smenu"  onchange="redirectToPage()">
                            <option selected>Select Options</option>
                            <option value="handset">Handset | Color | Package</option>
                            <option value="manage">Manage Users</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- first row starts here -->
            <div class="container card py-4 px-4 mb-5">
                <h5>Add Agents</h5>
                <hr>
              <div class="row">
                <div class="col-lg-4 grid-margin ">
                    <div class="card">
                        <div class="card-body">
                            <form id="users">
                            <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control" id="fname"  placeholder="John">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control" id="lname"  placeholder="Smith">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" id="email"  placeholder="John@eg.com">
                                    <label>Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option Selected>Select Option</option>
                                        <option value="1">Agent</option>
                                        <option value="2">Advisor</option>
                                        <option value="3">TL/Manager</option>
                                    </select>        
                                    <label>Is Verifier</label>
                                    <select class="form-control" name="verifier" id="verifier">
                                        <option Selected>Select Option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>       
                                    <input type="hidden" name="for" value="users"> 
                                    <button id="addagent" onclick="submitFormData(event)" class="form-control mt-3 btn-sm py-2 px-4 btn-primary"> Add Agent </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="theight card">
                        <table class="table table-striped"> 
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><b>Name</b></th>
                            <th scope="col"><b>Username</b></th>
                            <th scope="col"><b>Password</b></th>
                            <th scope="col"><b>Role</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showUsers($conn); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
               </div>
            </div>
         </div>

<!-- Include jQuery from CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function redirectToPage() {
    var selectElement = document.getElementById('smenu');
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;
    console.log(selectedOption);
    switch(selectedOption) {
        case 'handset':
            window.location.href = 'operations.php';
            break;
        case 'manage':
            window.location.href = 'manage_users.php';
            break;
        default:
            // If none of the above options match, do nothing
            break;
    }
}
 // JavaScript function to send form data via AJAX
 function submitFormData(event) {
        // Prevent default form submission behavior
        event.preventDefault();
        
        // Get form data
        var formData = new FormData(document.getElementById("users")); // Replace "yourFormId" with the actual ID of your form

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
            url: "http://localhost/o2crm/api/insert.php",
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
                    text: 'Status' + response,
                }).then(function() {
                    // Redirect the user to another page after the alert is closed
                    window.reload(); // Replace "http://example.com/redirect-page" with your actual redirect URL
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