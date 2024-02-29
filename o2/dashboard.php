
<title>Dashboard - O2 CRM</title>
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
                    <p class="m-0 pr-3">Dashboard</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                <button onclick="location.href = 'add_customer.php';" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi-plus-circle"></i> Add Customer </button>
              </div>
            </div>
            <!-- first row starts here -->
            <div class="row mb-4">
              <div class="col-lg-3 dashcard ">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-calendar-text"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> <?php echo getTotalWorkingDaysCurrentMonth(); ?></h4>
                      <span class="font-13 font-weight-semibold text-muted">Total Working Days</span>
                    </div> 
                  </div>
              </div>
              <div class="col-lg-3 dashcard ">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-calendar"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> <?php echo getWorkingDaysToGo(); ?> </h4>
                      <span class="font-13 font-weight-semibold text-muted">Working Days to Go </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard ">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Required SPD</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard ">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Total Applications</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Total Connected</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Connection Pending</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Connected Comms.</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Decline </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Cancelled </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Quality Scores </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Conversion </span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Connected to Go</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Incentive Earned.</span>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 dashcard mt-3">
                  <div class="d-flex mr-5 dcard">
                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                      <i class="mdi mdi-inbox-arrow-down"></i>
                    </button>
                    <div class="pl-2">
                      <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                      <span class="font-13 font-weight-semibold text-muted">Monthly Target.</span>
                    </div>
                  </div>
              </div>
              
            </div>

            <!-- chart row starts here -->
            <div class="row">
              <div class="col-sm-6 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="card-title"> Customers <small class="d-block text-muted">August 01 - August 31</small>
                      </div>
                      <div class="d-flex text-muted font-20">
                        <i class="mdi mdi-printer mouse-pointer"></i>
                        <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                      </div>
                    </div>
                    <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i class="mdi mdi-arrow-up"></i></span>
                    </h3>
                    <span class="text-muted font-13">Avg customers/Day</span>
                    <div class="line-chart-wrapper">
                      <canvas id="linechart" height="80"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="card-title"> Conversions <small class="d-block text-muted">August 01 - August 31</small>
                      </div>
                      <div class="d-flex text-muted font-20">
                        <i class="mdi mdi-printer mouse-pointer"></i>
                        <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                      </div>
                    </div>
                    <h3 class="font-weight-bold mb-0"> 0.40% <span class="text-success h5">0.20%<i class="mdi mdi-arrow-up"></i></span>
                    </h3>
                    <span class="text-muted font-13">Avg customers/Day</span>
                    <div class="bar-chart-wrapper">
                      <canvas id="barchart" height="80"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
           
          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>