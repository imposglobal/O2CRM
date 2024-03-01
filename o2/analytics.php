<title>Analytics</title>
<style>
    span#result {
    font-size: 12px;
    background: #0033c4;
    color: #fff;
    padding: 2px 10px;
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
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customers chart</h4>
                        <canvas id="lineChart" ></canvas>
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
$(document).ready(function() {
    // User-provided year parameter
    var year = 2023; // You can replace this with user input
    
    // AJAX call to fetch data from PHP script
    $.ajax({
        url: 'http://localhost/o2crm/api/analytics.php',
        type: 'GET',
        data: { year: year },
        dataType: 'json',
        success: function(response) {
            // Create chart
            createChart(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    // Function to create the chart
    function createChart(data) {
        var ctx = document.getElementById('lineChart').getContext('2d');
        var chartData = {
            labels: [],
            datasets: [{
                label: 'Total Customers',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: []
            }]
        };

        // Populate chart data
        data.forEach(function(item) {
            chartData.labels.push(item.month_name);
            chartData.datasets[0].data.push(item.total_customers);
        });

        var lineChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
});
</script>

          <!-- content-wrapper ends -->
        <!-- Footer  -->
        <?php require('footer.php'); ?>