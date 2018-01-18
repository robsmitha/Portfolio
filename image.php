<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["btnDelete"])){
        if(is_numeric($_POST["btnDelete"])){
            Image::remove($_POST["btnDelete"]);
            header("location: gallery.php");
        }
    }
    if(isset($_POST["btnDeleteComment"])){
        if(is_numeric($_POST["btnDeleteComment"])){
            Imagecomment::remove($_POST["btnDeleteComment"]);
            header("location: image.php?id=".$_POST["hfImageId"]);
        }
    }
    if(isset($_POST["btnPostComment"])){
        $returnVal = true;
        isset($_POST["comment"]) && $_POST["comment"] != "" ? $comment = $_POST["comment"] : $returnVal = false;
        isset($_POST["btnPostComment"]) ? $imageid = $_POST["btnPostComment"] : $returnVal = false;
        $currentDate = date('Y-m-d H:i:s');
        if($returnVal){
            $imagecomment = new Imagecomment(0,$comment,$customerId,1,$imageid,$currentDate, null);
            $imagecomment->save();
            header("location: image.php?id=$imageid");
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $image = new Image($_GET["id"]);
        if($image != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$imageCommentList = Imagecomment::loadbyimageid($image->getId());
$event = new Event($image->getEventId());
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>

<!-- Navigation -->
<?php include "navbar.php" ?>

<!-- Page Content -->
<div class="container">

    <h1 class="mt-4 mb-3"><?php echo nl2br($image->getName()) ?></h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="event-home.php">Events</a>
        </li>
        <?php
        if($image->getEventId() != null){
            ?>
            <li class="breadcrumb-item">
                <a href="event.php?id=<?php echo $image->getEventId() ?>"><?php echo $event->getName(); ?></a>
            </li>
            <li class="breadcrumb-item">
                <a href="event-images.php?id=<?php echo $image->getEventId() ?>">Gallery</a>
            </li>
            <?php
        }
        ?>
        <li class="breadcrumb-item active"><?php echo $image->getName() ?></li>
    </ol>

    <div class="row">

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">
            <?php
            if($securityuserid > 0){
                ?>
                <div class="dropdown show mb-2">
                    <a class="btn btn-secondary dropdown-toggle btn-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage Image
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="create-image.php?id=<?php echo $image->getId(); ?>&cmd=edit">Edit</a>
                        <form method="post">
                            <button name="btnDelete" class="dropdown-item" value="<?php echo $image->getId()?>">Delete</button>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Post Content Column -->
        <div class="col-lg-6">
            <!-- Preview Image -->
            <a href="#" data-toggle="modal" data-target="#myModal">
                <img class="img-fluid rounded" src="<?php echo $image->getImgUrl() ?>" alt="<?php echo $image->getName() ?>" title="<?php echo $image->getName() ?>">
            </a>
            <br>
            <br>

            <!-- Post Content -->
            <p>
                <?php echo nl2br($image->getName()) ?><br>
                <small><?php echo nl2br($image->getDescription()) ?></small>
            </p>
            <hr>
            <?php
            if(!empty($imageCommentList)){
                ?>
                <h3 class="text-center">Comments</h3>
                <br>
                <?php
                foreach ($imageCommentList as $imagecomment){
                    $customer = new Customer($imagecomment->getCustomerId());
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <div class="media-body">
                            <?php
                            if($securityuserid > 0 || $customerId == $imagecomment->getCustomerId()){
                                ?>
                                <form method="post">
                                    <input type="hidden" name="hfImageId" value="<?php echo $image->getId() ?>">
                                    <button type="submit" name="btnDeleteComment" value="<?php echo $imagecomment->getId() ?>" class="btn btn-outline-danger pull-right">Delete</button>
                                </form>
                                <?php
                            }
                            ?>
                            <h5 class="mt-0 mb-0"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></h5>
                            <?php echo nl2br($imagecomment->getComment()); ?>
                            <br>
                            <small>Posted on <?php echo date_format(date_create($imagecomment->getCreateDate()), 'g:ia \o\n l jS F Y') ?></small>

                        </div>
                    </div>
                    <?php
                }
            }
            if($customerId != null && $customerId > 0){
                ?>
                <!-- Comments Form -->
                <b class="lead text-white">Leave a Comment:</b>
                <form method="post">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button name="btnPostComment" id="btnPostComment" type="submit" class="btn btn-primary" value="<?php echo $image->getId() ?>">Submit</button>
                </form>
                <?php
            }
            else{
                ?>
                <div class="alert alert-dark" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="alert-heading">Hold up!</h5>
                    <p>Please <a href="login.php">Login</a> or <a href="create-customer.php">register</a> to comment on an image.</p>
                    <hr>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="login.php">Login</a>
                        <a class="btn btn-default" href="create-customer.php">Register</a>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <img id="imgModal" class="img-fluid" src="<?php echo $image->getImgUrl() ?>" alt="<?php echo $image->getName() ?>" title="<?php echo $image->getName() ?>">
    </div>
</div>
</body>

</html>
