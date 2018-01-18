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
      <h1 class="mt-4 mb-3">Portfolio 3
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 3</li>
      </ol>

      <div class="row">
          <?php
          $portfolioItemList = Portfolioitem::loadall();
          if(!empty($portfolioItemList)){
              foreach ($portfolioItemList as $portfolioitem){
                  ?>

                  <div class="col-lg-4 col-sm-6 portfolio-item">
                      <div class="card h-100">
                          <a href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>"><img class="card-img-top" src="<?php echo $portfolioitem->getImageUrl() ?>" alt=""></a>
                          <div class="card-body">
                              <h4 class="card-title">
                                  <a href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>"><?php echo $portfolioitem->getName() ?></a>
                              </h4>
                              <p class="card-text"><?php echo $portfolioitem->getDescription() ?></p>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          }
          ?>

      </div>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
