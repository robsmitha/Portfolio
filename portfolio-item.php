<?php include "classes.php" ?>
<?php
$securityUserId = SessionManager::getSecurityUserId();
$customerId = SessionManager::getCustomerId();
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $id = $_GET["id"];
        $portfolioitem = new Portfolioitem($id);
        if($portfolioitem != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-sm-9">
                <h1 class="mt-4 mb-3">
                    <?php echo $portfolioitem->getName(); ?>
                </h1>
            </div>
            <div class="col-sm-3">
                <?php
                if($securityUserId > 0){
                    ?>
                    <br>
                    <a href="create-portfolioitem.php?cmd=edit&id=<?php echo $portfolioitem->getId(); ?>" class="btn btn-danger btn-block">Edit</a>
                <?php
                }
                ?>
            </div>
        </div>


        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="portfolio-1-col.php">Portfolio</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $portfolioitem->getName(); ?></li>
        </ol>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <a data-toggle="modal" data-target="#myModal">
                    <img class="img-fluid mx-auto d-block" src="<?php echo $portfolioitem->getImageURL(); ?>" alt="<?php echo $portfolioitem->getName(); ?>">
                </a>
            </div>

            <div class="col-md-4">
                <h3 class="my-3">Project Description</h3>
                <p><?php echo nl2br($portfolioitem->getDescription()); ?></p>
                <a target="_blank" href="<?php echo $portfolioitem->getProjectUrl(); ?>" class="btn btn-primary btn-lg btn-block" title="Visit <?php echo $portfolioitem->getProjectUrl(); ?>">
                    <i class="icon-screen-desktop"></i> <?php echo $portfolioitem->getName(); ?>
                </a>
            </div>

        </div>
        <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Related Projects</h3>

      <div class="row">
          <?php
            $portfolioitemList = Portfolioitem::loadbyportfoliocategoryid($portfolioitem->getPortfolioCategoryId());
            if(!empty($portfolioitemList)){
                foreach ($portfolioitemList as $pi){
                    ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="portfolio-item.php?id=<?php echo $pi->getId() ?>">
                            <img class="img-fluid" src="<?php echo $pi->getImageUrl() ?>" alt="">
                        </a>
                    </div>
          <?php
                }
            }
          ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>
    <?php include "modal.php" ?>

  </body>

</html>
