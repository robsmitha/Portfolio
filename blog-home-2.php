<?php include "classes.php" ?>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    isset( $_GET["id"]) ? $blogcategoryid =  $_GET["id"] : $blogcategoryid =  null;
    $blogList = Blog::search(null,null,null,null,$blogcategoryid,null,null,null);
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
      <h1 class="mt-4 mb-3">Blog Home Two
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 2</li>
      </ol>
    <div class="row">
        <?php
        if(!empty($blogList)){
            foreach ($blogList as $b){
                ?>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">
                                    <img class="img-fluid rounded" src="<?php echo $b->getImgUrl() ?>" alt="">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title"><?php echo $b->getTitle() ?></h2>
                                <p class="card-text"><?php echo nl2br(substr($b->getDescription(), 0, 300)) ?>...</p>
                                <a href="blog-post.php?id=<?php echo $b->getId() ?>" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo $b->getCreateDate() ?> by
                        <a href="#"><?php echo $b->getSecurityUserId() ?></a>
                    </div>
                </div>
                <?php
            }
        }
        ?>

      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>

    </div>

  </div>
  <!-- /.container -->

    <?php include "footer.php" ?>

  <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

</body>

</html>
