<?php include "classes.php" ?>
<?php



/**
 * Created by PhpStorm.
 * User: Rob
 * Date: 12/9/2017
 * Time: 1:17 AM
 */
if(SessionManager::getSecurityUserId() == 0){
    header("location: admin-login.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $returnVal = true;
    isset($_POST["title"]) && $_POST["title"] != "" ? $title = $_POST["title"] : $returnVal = false;
    isset($_POST["description"]) && $_POST["description"] != "" ? $description = $_POST["description"] : $returnVal = false;
    isset($_POST["imgurl"]) && $_POST["imgurl"] != "" ? $imgurl = $_POST["imgurl"] : $returnVal = false;
    isset($_POST["eventid"]) && $_POST["eventid"] > 0 ? $eventid = $_POST["eventid"] : $returnVal = false;

    isset($_POST["chkFeaturedImage"]) && $_POST["chkFeaturedImage"] == "checked" ? $isfeaturedimage = 1 : $isfeaturedimage = 0;
    if($returnVal){
        if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"])){
            $image = new Image($_POST["btnEdit"],$title,$description,$imgurl,$eventid,0,$isfeaturedimage);

        }
        else{
            $image = new Image(0,$title,$description,$imgurl,$eventid,0,$isfeaturedimage);
        }

        $image->save();
        header("location:image.php?id=".$image->getId());
    }
    else{
        $validationMsg = "Please review your entries!";
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"])
        && is_numeric($_GET["id"])
        && $_GET["id"] > 0
        && isset($_GET["cmd"])
        && $_GET["cmd"] == "edit"){
        $image = new Image($_GET["id"]);
        if($image != null){

        }
        else{
            header("location: index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body class="bg-dark" id="page-top">
<?php include "navbar.php" ?>
<div class="container">
    <?php if(isset($validationMsg)) { ?>
        <div class="alert alert-danger alert-dismissible fade show mx-auto mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4> <?php  echo $validationMsg; ?> </h4>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mx-auto mt-5">
                <div class="card-header">
                    Create Image
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Title</label>
                            <input class="form-control" id="title" name="title" type="text" placeholder="Title" value="<?php if(isset($image)) echo $image->getName() ?>">
                        </div>
                        <div class="form-group">
                            <input name="chkFeaturedImage" id="chkFeaturedImage" type="checkbox" value="checked" <?php if(isset($image) && $image->getIsFeaturedImage() == 1) echo "checked" ?>> Feature Image On Front Page
                        </div>
                        <div class="form-group">
                            <label for="imgurl">Image Url</label>
                            <br>
                            <!--<input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url" value="<?php if(isset($image)) echo $image->getImgUrl() ?>">-->

                            <?php include_once("Utilities/FileUploader/upload.php") ?>
                        </div>
                        <div class="form-group">
                            <label for="eventid">Event</label>
                            <select class="form-control" name="eventid">
                                <?php
                                if(isset($image)) {
                                    $event = new Event($image->getEventId());
                                    ?>
                                    <option value="<?php echo $event->getId() ?>"><?php echo $event->getName() ?></option>
                                    <?php
                                }
                                else {
                                    ?>
                                    <option value="0">--Select Event--</option>
                                    <?php
                                }
                                $eventList = Event::loadall();
                                if(!empty($eventList)){
                                    foreach ($eventList as $e) {
                                        if(isset($image) && $e->getId() == $image->getEventId()){
                                            //skipp
                                        }
                                        else{
                                            ?>
                                            <option value="<?php echo $e->getId() ?>"><?php echo $e->getName() ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Type image description here"><?php if(isset($image)) echo $image->getDescription() ?></textarea>
                        </div>
                        <?php
                        if(isset($event)){
                            ?>
                            <button name="btnEdit" type="submit" class="btn btn-primary btn-block" value="<?php echo $image->getId(); ?>">Edit Image</button>
                            <?php
                        }
                        else{
                            ?>
                            <button name="btnCreate" type="submit" class="btn btn-primary btn-block">Create Image</button>
                            <?php
                        }
                        ?>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="admin-home.php">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>

<?php include "scripts.php" ?>

</body>

</html>

