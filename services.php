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
      <h1 class="mt-4 mb-3">Services
        <small>What We Do</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header -->
      <img class="img-fluid rounded mb-4" src="img/1200x300.jpg" alt="">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header"><i class="icon-screen-desktop"></i> Professional Web Development</h4>
                    <div class="card-body">
                        <p class="card-text">
                            A website serves as an online identitiy for a business. Our modern and professional web development standards ensure your website will scale flawlessly across all screen types and sizes.
                        </p>

                    </div>
                    <div class="card-footer">
                        <a href="portfolio-3-col.php" class="btn btn-primary">See Our Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header"><i class="icon-magnifier"></i> We Help You Get Found On Google</h4>
                    <div class="card-body">
                        <p class="card-text">The best way to generate online leads for any business is through organized online marketing strategies. We implement effective SEO techniques that attract more online customers.</p>
                    </div>
                    <div class="card-footer">
                        <a href="services.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header"><i class="icon-clock"></i> 24/7 Ecommerce Support</h4>
                    <div class="card-body">
                        <p class="card-text">Let's face it, the business of buying and selling has largely been moved online. Let Us handle the day-to-day website maintenance so you can focus on your next big move.</p>
                    </div>
                    <div class="card-footer">
                        <a href="shop-home.php" class="btn btn-primary">Shop Demo</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
