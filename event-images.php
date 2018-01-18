<?php include "classes.php" ?>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $event = new Event($_GET["id"]);
        if($event != null){

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

    <h1 class="mt-4 mb-3 d-none d-sm-block"><?php echo nl2br($event->getName()) ?></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="event-home.php">Events</a>
        </li>
        <li class="breadcrumb-item">
            <a href="event.php?id=<?php echo $event->getId() ?>"><?php echo $event->getName() ?></a>
        </li>
        <li class="breadcrumb-item active">Gallery</li>
    </ol>
    <div class="row text-center text-lg-left">
        <?php
        $imageList = Image::loadbyeventid($event->getId());
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
