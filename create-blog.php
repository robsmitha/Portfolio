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
    isset($_POST["blogcategory"]) && $_POST["blogcategory"] > 0 ? $blogcategory = $_POST["blogcategory"] : $returnVal = false;

    if($returnVal){
        $currentDate = date('Y-m-d H:i:s');
        $blog = new blog(0,$title,$description,$imgurl,$blogcategory,SessionManager::getSecurityUserId(),$currentDate,null);
        $blog->save();
        header("location: blog-post.php?id=".$blog->getId());
    }
    else{
        $validationMsg = "Please review your entries!";
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
                <div class="card-header">Create Blog</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Title</label>
                            <input class="form-control" id="title" name="title" type="text" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="imgurl">Image Url</label>
                            <input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url">
                        </div>
                        <div class="form-group">
                            <label for="blogcategory">Category</label>
                            <select class="form-control" name="blogcategory">
                                <option value="0">--Select Category--</option>
                                <?php
                                $blogCategoryList = Blogcategory::loadall();
                                if(!empty($blogCategoryList)){
                                    foreach ($blogCategoryList as $bc) {
                                        ?>
                                        <option value="<?php echo $bc->getId() ?>"><?php echo $bc->getName() ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Type blog content here"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Post Blog</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="shop-home.php">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "scripts.php" ?>

</body>

</html>

