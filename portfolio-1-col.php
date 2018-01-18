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
      <h1 class="mt-4 mb-3">Portfolio</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio</li>
      </ol>
        <?php
        $portfolioItemList = Portfolioitem::loadall();
        if(!empty($portfolioItemList)){
            foreach ($portfolioItemList as $portfolioitem){
                ?>
                <!-- Project One -->
                <div class="row">
                    <div class="col-md-7">
                        <a href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $portfolioitem->getImageUrl() ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <h3><?php echo $portfolioitem->getName() ?></h3>
                        <p><?php echo $portfolioitem->getDescription() ?></p>
                        <a class="btn btn-primary" href="portfolio-item.php?id=<?php echo $portfolioitem->getId() ?>">View Project
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
                <!-- /.row -->

                <hr>
        <?php
            }
        }
        ?>

      <!-- Pagination
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
      </ul> -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
