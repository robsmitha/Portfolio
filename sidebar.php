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
      <h1 class="mt-4 mb-3">Sidebar Page
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="home.php" class="list-group-item">Home</a>
            <a href="about.php" class="list-group-item">About</a>
            <a href="services.php" class="list-group-item">Services</a>
            <a href="contact.php" class="list-group-item">Contact</a>
            <a href="portfolio-1-col.php" class="list-group-item">1 Column Portfolio</a>
            <a href="portfolio-2-col.php" class="list-group-item">2 Column Portfolio</a>
            <a href="portfolio-3-col.php" class="list-group-item">3 Column Portfolio</a>
            <a href="portfolio-4-col.php" class="list-group-item">4 Column Portfolio</a>
            <a href="blog-home.php" class="list-group-item">Blog Home 1</a>
            <a href="blog-home-2.php" class="list-group-item">Blog Home 2</a>
            <a href="full-width.php" class="list-group-item">Full Width Page</a>
            <a href="faq.php" class="list-group-item">FAQ</a>
            <a href="404.php" class="list-group-item">404</a>
            <a href="pricing.php" class="list-group-item">Pricing Table</a>
          </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Section Heading</h2>
          <p>
              This page has a nice sidebar.
          </p>
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
