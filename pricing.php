<?php include "classes.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Pricing
        <small>Complete website packages to fit any budget!</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h3 class="card-header">Basic</h3>
            <div class="card-body">
              <div class="display-4">$299.99</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Responisve Web Design</li>
              <li class="list-group-item">Contact Form</li>
              <li class="list-group-item">Static Web pages or CMS</li>
                <li class="list-group-item list-group-item-success">Database Functionality +$200</li>
              <li class="list-group-item">
                <a href="contact.php" class="btn btn-primary">Sign Up!</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card card-outline-primary h-100">
            <h3 class="card-header bg-primary text-white">Plus</h3>
            <div class="card-body">
              <div class="display-4">$749.99</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Scalable Web Solution</li>
              <li class="list-group-item">User Log In</li>
              <li class="list-group-item">Dynamic Web Pages</li>
                <li class="list-group-item list-group-item-success">Administrative Functionality +$400</li>
              <li class="list-group-item">
                <a href="contact.php" class="btn btn-primary">Sign Up!</a>
              </li>
            </ul>
          </div>
        </div>
          <div class="col-lg-4 mb-4">
              <div class="card h-100">
                  <h3 class="card-header">Ultra</h3>
                  <div class="card-body">
                      <div class="display-4">$1499.99</div>
                  </div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">Interactive Web Application</li>
                      <li class="list-group-item">Administrative Functionality</li>
                      <li class="list-group-item">Powerful Backend Database</li>
                      <li class="list-group-item list-group-item-success">Ecommerce Functionality +$600</li>
                      <li class="list-group-item">
                          <a href="contact.php" class="btn btn-primary">Sign Up!</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <!-- /.row -->
        <hr>
        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>
                    The packages above give a good indication of what is included in a basic one time website package. The final price depends on the websites needs and total development costs.
                    You can get a personal quote by <a href="contact.php">clicking here.</a>
                </p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="contact.php">Contact Now</a>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
