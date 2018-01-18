<?php include "classes.php" ?>
<?php
$eventList = Event::loadall();
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
    <h1 class="mt-4 mb-3">Events
        <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>
    <?php
    if(!empty($eventList)){
        foreach ($eventList as $event){
            ?>
            <!-- Project One -->
            <div class="row">
                <div class="col-md-7">
                    <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $event->getImgUrl() ?>" alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3><?php echo $event->getName() ?></h3>
                    <b><?php echo $event->getLocation() ?></b>
                    <p><?php echo $event->getDescription() ?></p>
                    <a class="btn btn-primary" href="event.php?id=<?php echo $event->getId() ?>">View Event
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
</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
