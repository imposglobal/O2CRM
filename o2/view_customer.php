<?php require('../api/sessions.php') ?>
<title>View Customer </title>
      <!-- partial:partials/_sidebar.html -->
      <?php require('sidebar.php'); ?>
      <!-- partial -->
  <style>
     ::-webkit-scrollbar{
        height: 4px;
        width: 4px;
        background: gray;
    }
    ::-webkit-scrollbar-thumb:horizontal{
        background: #272727;
        border-radius: 10px;
    }
    a.text-white.px-3.py-1.rounded {
    font-size: 12px !important;
}
    <?php
      if($role == 1){
        echo 'th.ag {
          display: none;
      }';
      echo 'td.ag {
        display: none;
      }';
      }
      if($role == 2){
        echo 'th.ag.tm{
          display: none;
      }';
      echo 'td.ag.tm {
        display: none;
    }';
      }
      if($role == 3){
        echo 'th.sp {
          display: none;
      }';
      echo 'td.sp {
        display: none;
      }';
      }
      if($role != 0){
        echo 'th.delete {
          display: none;
      }';
      echo 'td.delete {
        display: none;
      }';
      }
    ?>
  </style>
      
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
                    <p class="m-0 pr-3">View Customer</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                
              </div>
            </div>
            <HR>
            <!-- first row starts here -->
            <div class="row">
                <?php displayUsersWithPagination($conn,'10',$url, $role); ?>
            </div>
         
            <!-- Button to trigger AJAX call and modal -->

        <!-- Modal -->
        <div class="modal fade" id="viewCust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" id="cname"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="modalBody">
                Loading...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <script>
          function openModalWithAjax(id) {
            // Make AJAX call
            $.ajax({
              url: '<?php echo $url; ?>/api/customer.php',
              type: 'GET',
              data: { cid: id }, // Pass the id parameter
              success: function(response) {
                console.log(response)
    // Parse JSON response
    var data = JSON.parse(response);
    
    // Generate HTML to display all fields in a two-column table
    var html = '<table class="table">';
        html += '<tbody>';
        
        var keys = Object.keys(data);
        for (var i = 0; i < keys.length; i += 2) {
            html += '<tr>';
            html += '<td><strong>' + keys[i] + ':</strong></td>';
            html += '<td>' + data[keys[i]] + '</td>';
            if (keys[i + 1]) {
                html += '<td><strong>' + keys[i + 1] + ':</strong></td>';
                html += '<td>' + data[keys[i + 1]] + '</td>';
            }
            html += '</tr>';
        }
        
        html += '</tbody>';
        html += '</table>';
        // Update modal body with generated HTML
        $('#modalBody').html(html);
        $("#cname").text(data.First_Name);
        // Open modal
        $('#viewCust').modal('show');
},

              error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
              }
            });
          }
        </script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>