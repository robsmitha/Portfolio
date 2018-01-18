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
    isset($_POST["eventname"]) && $_POST["eventname"] != "" ? $eventname = $_POST["eventname"] : $returnVal = false;
    isset($_POST["description"]) && $_POST["description"] != "" ? $description = $_POST["description"] : $returnVal = false;
    isset($_POST["imgurl"]) && $_POST["imgurl"] != "" ? $imgurl = $_POST["imgurl"] : $returnVal = false;
    isset($_POST["ticketlink"]) && $_POST["ticketlink"] != "" ? $ticketlink = $_POST["ticketlink"] : $returnVal = false;
    isset($_POST["location"]) && $_POST["location"] != "" ? $location = $_POST["location"] : $returnVal = false;
    $startdate = $_POST["startdate"]; //: $returnVal = false;
    $enddate = $_POST["enddate"]; //: $returnVal = false;
    isset($_POST["eventtype"]) && $_POST["eventtype"] > 0 ? $eventtype = $_POST["eventtype"] : $returnVal = false;

    if($returnVal){
        if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"])){
            $event = new Event($_POST["btnEdit"], $eventname, $description, $imgurl, $startdate, $enddate, $location,$eventtype,$ticketlink);
        }
        else{
            $event = new Event(0, $eventname, $description, $imgurl, $startdate, $enddate, $location,$eventtype,$ticketlink);
        }
        $event->save();
        header("location: event.php?id=".$event->getId());
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
        $event = new Event($_GET["id"]);
        if($event != null){

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
                <div class="card-header">Create Event</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control" id="eventname" name="eventname" type="text" placeholder="Event Name" value="<?php if(isset($event)) echo $event->getName(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="imgurl">Image Url</label>
                            <input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url" value="<?php if(isset($event)) echo $event->getImgUrl(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="imgurl">Ticket Link</label>
                            <input class="form-control" id="ticketlink" name="ticketlink" type="text" placeholder="Ticket Link" value="<?php if(isset($event)) echo $event->getTicketLink(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Event Description" required><?php if(isset($event)) echo $event->getDescription(); ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="eventtype">Type</label>
                                    <select class="form-control" name="eventtype" required>
                                        <?php
                                        if(isset($event)) {
                                            $eventtype = new Eventtype($event->getEventTypeId());
                                        ?>
                                            <option value="<?php echo $eventtype->getId() ?>"><?php echo $eventtype->getName() ?></option>
                                        <?php
                                        }
                                        else {
                                        ?>
                                            <option value="0">--Select Type--</option>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $eventTypeList = Eventtype::loadall();
                                        if(!empty($eventTypeList)){
                                            foreach ($eventTypeList as $it) {
                                                if(isset($event) && $it->getId() == $event->getEventTypeId()){
                                                    //skipp
                                                }
                                                else{
                                                ?>
                                                <option value="<?php echo $it->getId() ?>"><?php echo $it->getName() ?></option>
                                                <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="imgurl">Start Date</label>
                                    <input class="form-control" id="startdate" name="startdate" type="datetime-local" value="<?php if(isset($event)) echo date_format(date_create($event->getStartDate()), 'Y-m-d\TH:i:s'); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="price">End Date</label>
                                    <input class="form-control" id="enddate" name="enddate" type="datetime-local" value="<?php if(isset($event)) echo date_format(date_create($event->getEndDate()), 'Y-m-d\TH:i:s'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Location</label>
                            <textarea class="form-control" id="location" name="location" rows="3" type="text" placeholder="Event Location Information" required><?php if(isset($event)) echo $event->getLocation(); ?></textarea>
                        </div>
                        <?php
                        if(isset($event)){
                            ?>
                            <button name="btnEdit" type="submit" class="btn btn-primary btn-block" value="<?php echo $event->getId(); ?>">Edit Event</button>
                            <?php
                        }
                        else{
                            ?>
                            <button name="btnCreate" type="submit" class="btn btn-primary btn-block">Create Event</button>
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

