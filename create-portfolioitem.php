<?php include "classes.php" ?>
<?php



/**
 * Created by PhpStorm.
 * User: Rob
 * Date: 12/9/2017
 * Time: 1:17 AM
 */
$securityuserid = SessionManager::getSecurityUserId();
if($securityuserid == 0){
    header("location: admin-login.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["btnDelete"])
        && is_numeric($_POST["btnDelete"])
        && $_POST["btnDelete"] > 0){
        PortfolioItem::remove($_POST["btnDelete"]);
        header("location:index.php");
    }

    $returnVal = true;
    isset($_POST["portfolioitemname"]) && $_POST["portfolioitemname"] != "" ? $portfolioitemname = $_POST["portfolioitemname"] : $returnVal = false;
    isset($_POST["description"]) && $_POST["description"] != "" ? $description = $_POST["description"] : $returnVal = false;
    isset($_POST["imgurl"]) && $_POST["imgurl"] != "" ? $imgurl = $_POST["imgurl"] : $returnVal = false;
    isset($_POST["projecturl"]) && $_POST["projecturl"] != "" ? $projectlink = $_POST["projecturl"] : $returnVal = false;


    isset($_POST["portfoliocategory"]) && $_POST["portfoliocategory"] > 0 ? $portfoliocategory = $_POST["portfoliocategory"] : $returnVal = false;

    //header("location:create-portfolioitem.php?$portfoliocategory");
    if($returnVal){
        if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"])){
            $createDate = $_POST["hfCreateDate"];
            $portfolioitem = new PortfolioItem($_POST["btnEdit"], $portfolioitemname, $description, $projectlink, $imgurl, $portfoliocategory, $createDate);
        }
        else{
            $currentDate = date('Y-m-d H:i:s');
            $portfolioitem = new PortfolioItem(0, $portfolioitemname, $description, $projectlink, $imgurl, $portfoliocategory, $currentDate);
        }

        $portfolioitem->save();
        header("location: portfolio-item.php?id=".$portfolioitem->getId());
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
        $portfolioitem = new PortfolioItem($_GET["id"]);
        if($portfolioitem != null){

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
                <div class="card-header">Create Portfolio Item
                    <?php
                    if(isset($portfolioitem)) {
                        ?>
                        <form method="post" class="pull-right">
                            <button type="submit" name="btnDelete" class="btn btn-danger" value="<?php echo $portfolioitem->getId(); ?>">Delete</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control" id="portfolioitemname" name="portfolioitemname" type="text" placeholder="Portfolio Item Name" value="<?php if(isset($portfolioitem)) echo $portfolioitem->getName() ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Portfolio Item Description"><?php if(isset($portfolioitem)) echo $portfolioitem->getDescription() ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="username">Project Url</label>
                            <input class="form-control" id="projecturl" name="projecturl" type="text" placeholder="Project Url" value="<?php if(isset($portfolioitem)) echo $portfolioitem->getProjectUrl() ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Image Url</label>
                            <input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url" value="<?php if(isset($portfolioitem)) echo $portfolioitem->getImageUrl() ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="itemtype">Portfolio Category</label>
                                    <select class="form-control" name="portfoliocategory">
                                        <?php
                                        if(isset($portfolioitem)) {
                                            $portfolioCategory = new Portfoliocategory($portfolioitem->getPortfolioCategoryId());
                                            ?>
                                            <option value="<?php echo $portfolioCategory->getId() ?>"><?php echo $portfolioCategory->getName() ?></option>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <option value="0">--Select Type--</option>
                                            <?php
                                        }
                                        $portfolioCategoryList = Portfoliocategory::loadall();
                                        if(!empty($portfolioCategoryList)){
                                            foreach ($portfolioCategoryList as $pc) {
                                                if(isset($portfolioitem) && $pc->getId() == $portfolioitem->getPortfolioCategoryId()){
                                                    //skipp
                                                }
                                                else{
                                                    ?>
                                                    <option value="<?php echo $pc->getId() ?>"><?php echo $pc->getName() ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($portfolioitem)){
                            ?>
                            <input type="hidden" name="hfCreateDate" value="<?php echo $portfolioitem->getCreateDate(); ?>">
                            <button name="btnEdit" type="submit" class="btn btn-primary btn-block" value="<?php echo $portfolioitem->getId(); ?>">Edit Portfolio Item</button>
                            <?php
                        }
                        else{
                            ?>
                            <button type="submit" class="btn btn-primary btn-block">Create Portfolio Item</button>
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

<?php include "scripts.php" ?>

</body>

</html>

