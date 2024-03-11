<?php require('../api/sessions.php') ?>
<title>Operations</title>
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
                    <p class="m-0">ADE-00234</p>
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
                            <?php if($role == 0){
                                echo'<option value="manage">Manage Users</option>';
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- first row starts here -->
            <div class="container card py-4 px-4 mb-5">
                <div class="row">
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                    <label>Handset Name</label>
                                    <input type="text" name="hname" class="form-control" id="hname"  placeholder="Samsung">
                                    <button id="addhand" onclick="" class="form-control mt-3 btn-sm py-2 px-4 btn-primary"> Add Handset </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                    <label>Handset Color</label>
                                    <input type="text" name="hcolor" class="form-control" id="hcolor"  placeholder="Samsung">
                                    <button id="addcolor" onclick="" class="form-control mt-3 btn-sm py-2 px-4 btn-primary mb-md-0 mr-2"> Add Handset </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                    <label>Package Name</label>
                                    <input type="text" name="hcolor" class="form-control" id="pkgname"  placeholder="unlim £18 -24 Months">
                                    <button id="addpkg" onclick="" class="form-control mt-3 btn-sm py-2 px-4 btn-primary mb-md-0 mr-2"> Add Handset </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card theight">
                        <table class="table table-striped"> 
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><b>Handset Name</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showHandset($conn,$url); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="theight card">
                        <table class="table table-striped"> 
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><b>Handset Colors</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showColors($conn,$url); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card  theight">
                        <table class="table table-striped"> 
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><b>Package Name</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showPackage($conn,$url); ?>
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

$(document).ready(function(){
    $('#addhand').click(function(){
        var handset_name = $('#hname').val();

        $.ajax({
            url: '<?php echo $url; ?>/api/insert.php',
            method: 'POST',
            data: {hname: handset_name, for:'handset'},
            success: function(response){
                console.log(response);
                alert("Handset added successfully!");
                window.location.reload(); // Reload the page
            },
            error: function(xhr, status, error){
                console.error(xhr, status, error);
                alert("Error occurred while adding handset.");
            }
        });
    });

    $('#addcolor').click(function(){
        var color_name = $('#hcolor').val();

        $.ajax({
            url: '<?php echo $url; ?>/api/insert.php',
            method: 'POST',
            data: {hcolor: color_name, for:'hcolor'},
            success: function(response){
                console.log(response);
                alert("Color added successfully!");
                window.location.reload(); // Reload the page
            },
            error: function(xhr, status, error){
                console.error(xhr, status, error);
                alert("Error occurred while adding color.");
            }
        });
    });

    $('#addpkg').click(function(){
        var pkgname = $('#pkgname').val();

        $.ajax({
            url: '<?php echo $url; ?>/api/insert.php',
            method: 'POST',
            data: {pkgname: pkgname, for:'pname'},
            success: function(response){
                console.log(response);
                alert("Package added successfully!");
                window.location.reload(); // Reload the page
            },
            error: function(xhr, status, error){
                console.error(xhr, status, error);
                alert("Error occurred while adding package.");
            }
        });
    });
});

function redirectToPage() {
    var selectElement = document.getElementById('smenu');
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;
    console.log('selectedOption');
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

</script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>