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
                        <select class="form-control" id="smenu">
                            <option selected>Select Options</option>
                            <option value="Handset">Handset | Color | Package</option>
                            <option value="Package">Agents</option>
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
                            <hr>
                            <div class="form-group">
                                    <label>Handset Color</label>
                                    <input type="text" name="hcolor" class="form-control" id="hcolor"  placeholder="Samsung">
                                    <button id="addcolor" onclick="" class="form-control mt-3 btn-sm py-2 px-4 btn-primary mb-md-0 mr-2"> Add Handset </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div style="height: 280px; overflow: auto;" class="card">
                        <table class="table table-striped"> 
                            <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><b>Handset Name</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showHandset($conn); ?>
                            </tbody>
                        </table>
                    </div><br>
                    <hr>
                    <div class="mt-4" style="height: 280px; overflow: auto;" class="card">
                        <table class="table table-striped"> 
                            <thead>
                            <tr style="background:#272727" class="text-white">
                            <th scope="col">#</th>
                            <th scope="col"><b>Handset Colors</b></th>
                            <th scope="col"><b>Delete</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php showColors($conn); ?>
                            </tbody>
                        </table>
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
            url: 'http://localhost/o2crm/api/insert.php', // Specify the URL of the server-side script
            method: 'POST', // Specify the method (POST or GET)
            data: {hname: handset_name, for:'handset'}, // Pass the data to the server-side script
            success: function(response){
                // Handle the success response here
                console.log(response);
            },
            error: function(xhr, status, error){
                // Handle errors here
                console.error(xhr, status, error);
            }
        });
    });
});

//for color adding 
$(document).ready(function(){
    $('#addcolor').click(function(){
        var handset_name = $('#hcolor').val();

        $.ajax({
            url: 'http://localhost/o2crm/api/insert.php', // Specify the URL of the server-side script
            method: 'POST', // Specify the method (POST or GET)
            data: {hcolor: handset_name, for:'hcolor'}, // Pass the data to the server-side script
            success: function(response){
                // Handle the success response here
                console.log(response);
            },
            error: function(xhr, status, error){
                // Handle errors here
                console.error(xhr, status, error);
            }
        });
    });
});
</script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>