  <!-- partial:partials/_footer.html -->
  <footer class="footer">
           
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
    // JavaScript function to get ID from search input and pass through AJAX
    function searchAndSubmit() {
        // Get the ID from the search input
        var customerId = $('#search').val().trim();

        // Check if the ID is empty
        if (customerId === '') {
            // Show Sweet Alert for empty search input
            Swal.fire(
                'Input Error!',
                'Please enter a customer ID.',
                'error'
            );
            return;
        }

        // Show Sweet Alert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to search for customer with ID: ' + customerId,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, search it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform AJAX request
                $.ajax({
                    type: "POST",
                    url: "search.php", // Replace with your search endpoint
                    data: { id: customerId },
                    success: function(response) {
                        // Handle success response
                        console.log("Search result: " + response);
                        // Show success message
                        Swal.fire(
                            'Success!',
                            'Customer found: ' + response,
                            'success'
                        );
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error("Error occurred while searching:", error);
                        // Show error message
                        Swal.fire(
                            'Error!',
                            'An error occurred while searching for the customer.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

  </body>
</html>