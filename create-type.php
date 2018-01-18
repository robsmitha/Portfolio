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

    if($returnVal){
        switch ($_POST["type"]){
            case "blogcategory":
                if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"]) && $_POST["btnEdit"] > 0){
                    $blogcategory = new Blogcategory($_POST["btnEdit"],$title,$description);
                }
                else{
                    $blogcategory = new Blogcategory(0,$title,$description);
                }
                $blogcategory->save();
                break;
            case "itemtype":
                if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"]) && $_POST["btnEdit"] > 0){
                    $itemtype = new Itemtype($_POST["btnEdit"],$title,$description);
                }
                else{
                    $itemtype = new Itemtype(0,$title,$description);
                }
                $itemtype->save();
                break;
            case "portfoliocategory":
                if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"]) && $_POST["btnEdit"] > 0){
                    $portfoliocategory = new Portfoliocategory($_POST["btnEdit"],$title,$description);
                }
                else{
                    $portfoliocategory = new Portfoliocategory(0,$title,$description);
                }
                $portfoliocategory->save();
                break;
            case "eventtype":
                if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"]) && $_POST["btnEdit"] > 0){
                    $eventtype = new Eventtype($_POST["btnEdit"],$title,$description);
                }
                else{
                    $eventtype = new Eventtype(0,$title,$description);
                }
                $eventtype->save();
                break;
        }
        header("location: admin-home.php?msg=Success");
    }
    else{
        $validationMsg = "Please review your entries!";
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["type"])){
        $type = $_GET["type"];
    }
    if(isset($_GET["id"])
        && is_numeric($_GET["id"])
        && $_GET["id"] > 0
        && isset($_GET["cmd"])
        && $_GET["cmd"] == "edit"){
        $entity = null;
        if(isset($type)){
            switch ($type){
                case "blogcategory":
                    $entity = new Blogcategory($_GET["id"]);
                    break;
                case "itemtype":
                    $entity = new Blogcategory($_GET["id"]);
                    break;
                case "portfoliocategory":
                    $entity = new Blogcategory($_GET["id"]);
                    break;
                case "eventtype":
                    $entity = new Blogcategory($_GET["id"]);
                    break;
            }
            if($entity != null){

            }
            else{
                header("location: index.php");
            }
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
                <div class="card-header">Create <?php if(isset($type)) echo $type;  ?></div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text" placeholder="Title" value="<?php if(isset($entity)) echo $entity->getName() ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Describe <?php if(isset($type)) echo $type;  ?> here"><?php if(isset($entity)) echo $entity->getDescription() ?></textarea>
                        </div>
                        <?php
                        if(isset($entity)){
                            ?>
                            <button name="btnEdit" type="submit" class="btn btn-primary btn-block" value="<?php echo $entity->getId(); ?>">Edit <?php if(isset($type)) echo $type;  ?></button>
                            <?php
                        }
                        else{
                            ?>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            <?php
                        }
                        ?>
                        <input type="hidden" name="type" value="<?php if(isset($type)) echo $type;  ?>">
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="admin-home.php">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "scripts.php" ?>

</body>

</html>

