<?php include "classes.php" ?>
<?php
$eventList = Event::loadall();
$securityuserid = SessionManager::getSecurityUserId();
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
        <small>Keep in touch with your customers!</small>
        <?php
        if($securityuserid > 0){
            ?>
            <a class="btn btn-danger pull-right" href="create-event.php">Create Event</a>
            <?php
        }
        ?>
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Events</li>
    </ol>
    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="true"><i class="fa fa-clock-o"></i> Latest Shows</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false"><i class="fa fa-list"></i> All Shows</a>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
            <?php
            $eventList = Event::loadall();
            if(!empty($eventList)){
                foreach ($eventList as $event){
                    ?>
                    <!-- Project One -->
                    <div class="row">
                        <div class="col-md-7">
                            <a href="event.php?id=<?php echo $event->getId() ?>">
                                <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $event->getImgUrl() ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h3><?php echo $event->getName() ?></h3>
                            <b><?php echo $event->getLocation() ?></b>
                            <p><?php echo nl2br(substr($event->getDescription(), 0, 300)); ?></p>
                            <div class="btn-group">
                                <?php
                                if($securityuserid > 0){
                                    ?>
                                    <a class="btn btn-danger pull-right" href="create-event.php?id=<?php echo $event->getId(); ?>&cmd=edit">Edit Event</a>
                                    <?php
                                }
                                ?>
                                <a class="btn btn-primary" href="event.php?id=<?php echo $event->getId() ?>">View Event
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <a class="btn btn-default" href="<?php echo $event->getTicketLink() ?>">Get Tickets
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <hr>
                    <?php
                }
            }
            ?>
        </div>
        <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
            <?php
            if(!empty($eventList)){
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th class="d-none d-sm-table-cell">Start Time</th>
                    <th class="d-none d-sm-table-cell">End Time</th>
                    <th class="d-none d-sm-table-cell">Location</th>
                    <th class="d-none d-sm-table-cell">Tickets</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($eventList as $event){
                    ?>
                    <tr>
                        <td>
                            <h5><a href="event.php?id=<?php echo $event->getId() ?>"><?php echo $event->getName() ?></a></h5>
                        </td>
                        <td><?php echo date_format(date_create($event->getStartDate()), 'm/d/y'); ?></td>
                        <td class="d-none d-sm-table-cell"><?php echo date_format(date_create($event->getStartDate()), 'g:i A'); ?></td>
                        <td class="d-none d-sm-table-cell"><?php echo date_format(date_create($event->getEndDate()), 'g:i A'); ?></td>
                        <td class="d-none d-sm-table-cell"><?php echo $event->getLocation() ?></td>
                        <td class="d-none d-sm-table-cell"><a class="btn btn-primary" href="<?php echo $event->getTicketLink() ?>">Get Tickets</a></td>
                    </tr>
                    <?php
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>

</body>

</html>
