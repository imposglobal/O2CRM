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

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Offcanvas right</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body" id="offcanvasRightBody">
            <!-- Data fetched by AJAX will be displayed here -->
          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          function toggleOffcanvas(offcanvasId, cid) {
            var offcanvas = document.getElementById(offcanvasId);
            var offcanvasBody = document.getElementById(offcanvasId + 'Body');
            
            if (offcanvas.classList.contains('show')) {
              offcanvas.classList.remove('show');
            } else {
              offcanvas.classList.add('show');
              // Fetch data using AJAX and update offcanvas body
              $.ajax({
                url: 'your_data_endpoint_url',
                method: 'GET',
                data: { cid: cid },
                success: function(response) {
                  offcanvasBody.innerHTML = response;
                },
                error: function(xhr, status, error) {
                  console.error(error);
                }
              });
            }
          }
        </script>


         <!-- Include jQuery from CDN -->

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>