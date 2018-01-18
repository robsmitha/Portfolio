<?php include "classes.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>

<!-- Navigation -->
<?php include "navbar.php" ?>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4 text-center text-lg-left">Images from Events</h1>

    <div class="row text-center text-lg-left">
        <?php
        $imageList = Image::loadall();
        if(!empty($imageList)){
            foreach ($imageList as $image){
                ?>
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <a href="image.php?id=<?php echo $image->getId(); ?>" class="d-block mb-4 h-100" title="<?php echo $image->getName(); ?>">
                        <img id="img<?php echo $image->getId(); ?>" class="img-fluid img-thumbnail" src="<?php echo $image->getImgUrl(); ?>" alt="<?php echo $image->getDescription(); ?>">
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
