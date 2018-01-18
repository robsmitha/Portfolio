<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $returnVal = true;
    if(isset($_POST["btnPostComment"])){
        isset($_POST["comment"]) && $_POST["comment"] != "" ? $comment = $_POST["comment"] : $returnVal = false;
        isset($_POST["hfBlogId"]) && $_POST["hfBlogId"] != "" ? $blogid = $_POST["hfBlogId"] : $returnVal = false;
        $currentDate = date('Y-m-d H:i:s');
        if($returnVal){
            $blogcomment = new Blogcomment(0,$comment,$customerId,1,$blogid,$currentDate, null);
            $blogcomment->save();
            header("location: blog-post.php?id=$blogid");
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $blog = new Blog($_GET["id"]);
        if($blog != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$blogCommentList = Blogcomment::loadbyblogid($blog->getId());
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
      <h1 class="mt-4 mb-3">
          <?php echo $blog->getTitle() ?>
        <small>by
          <a href="#">
              <?php
              $user = new Securityuser($blog->getSecurityUserId());
              echo  $user->getUsername();
              ?>
          </a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 2</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $blog->getImgUrl() ?>" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo date_format(date_create($blog->getCreateDate()), 'g:ia \o\n l jS F Y') ?></p>

          <hr>

          <!-- Post Content -->
          <p>
              <?php echo nl2br($blog->getDescription()) ?>
          </p>

          <hr>
            <?php
            if(!empty($blogCommentList)){
                ?>
                <h3 class="text-center">Comments</h3>
                <br>
                <?php
                foreach ($blogCommentList as $blogcomment){
                    $customer = new Customer($blogcomment->getCustomerId());
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <div class="media-body">
                            <?php
                            if($securityuserid > 0 || $customerId == $blogcomment->getCustomerId()){
                                ?>
                                <form method="post">
                                    <input type="hidden" name="hfEventId" value="<?php echo $blog->getId() ?>">
                                    <button type="submit" name="btnDeleteComment" value="<?php echo $blogcomment->getId() ?>" class="btn btn-outline-danger pull-right">Delete</button>
                                </form>
                                <?php
                            }
                            ?>
                            <h5 class="mt-0 mb-0"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></h5>
                            <?php echo $blogcomment->getComment(); ?>
                            <br>
                            <small>Posted on <?php echo date_format(date_create($blogcomment->getCreateDate()), 'g:ia \o\n l jS F Y') ?></small>

                        </div>
                    </div>
                    <?php
                }
            }
            if($customerId != null && $customerId > 0){
                ?>
                <!-- Comments Form -->
                <b class="lead">Leave a Comment:</b>
                <form method="post">
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button name="btnPostComment" id="btnPostComment" type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="hfBlogId" value="<?php echo $blog->getId() ?>">
                </form>
                <?php
            }
            else{
                ?>
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="alert-heading">Hold up!</h5>
                    <p>Please <a href="login.php">Login</a> or <a href="create-customer.php">register</a> to comment on an blog.</p>
                    <hr>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="login.php">Login</a>
                        <a class="btn btn-default" href="create-customer.php">Register</a>
                    </div>
                </div>
                <?php
            }
            ?>


          <!-- Comment with nested comments
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div> -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div> -->

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                  <?php
                  $blogCategoryLiat = Blogcategory::loadall();
                  if(!empty($blogCategoryLiat)){
                      foreach ($blogCategoryLiat as $bc) {
                          ?>
                  <div class="col-lg-6">
                      <a href="blog-home.php?id=<?php echo $bc->getId() ?>"><?php echo $bc->getName() ?></a>
                  </div>
                  <?php
                      }
                  }
                  ?>
              </div>
            </div>
          </div>

            <!-- Side Widget -->
            <?php
            $pid = mt_rand(1,10);
            $p = new Portfolioitem();
            $p->load($pid);
            ?>
            <!-- Side Widget -->
            <div class="card my-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h5>Portfolio Spotlight</h5>
                        </div>
                        <div class="col-3">
                            <a onclick="location.reload();" class="pull-right">
                                <i class="icon-reload"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4><?php echo $p->getName() ?></h4>
                    <p><?php echo $p->getDescription() ?></p>
                </div>
                <div class="card-footer">
                    <a href="portfolio-item.php?id=<?php echo $p->getId(); ?>" class="btn btn-primary btn-block">View Project</a>
                </div>
            </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
