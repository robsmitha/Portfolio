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
        Item::remove($_POST["btnDelete"]);
        header("location:shop-home.php");
    }

    $returnVal = true;
    isset($_POST["itemname"]) && $_POST["itemname"] != "" ? $itemname = $_POST["itemname"] : $returnVal = false;
    isset($_POST["description"]) && $_POST["description"] != "" ? $description = $_POST["description"] : $returnVal = false;
    isset($_POST["imgurl"]) && $_POST["imgurl"] != "" ? $imgurl = $_POST["imgurl"] : $returnVal = false;
    isset($_POST["price"]) && $_POST["price"] != "" ? $price = $_POST["price"] : $returnVal = false;


    isset($_POST["itemstatustype"]) && $_POST["itemstatustype"] > 0 ? $itemstatustype = $_POST["itemstatustype"] : $returnVal = false;
    isset($_POST["itemtype"]) && $_POST["itemtype"] > 0 ? $itemtype = $_POST["itemtype"] : $returnVal = false;
    if($returnVal){
        if(isset($_POST["btnEdit"]) && is_numeric($_POST["btnEdit"])){
            $createDate = $_POST["hfCreateDate"];
            $item = new Item($_POST["btnEdit"], $itemname, $description, $imgurl, $price, $itemtype, $itemstatustype,$createDate,null);
        }
        else{
            $currentDate = date('Y-m-d H:i:s');
            $item = new Item(0, $itemname, $description, $imgurl, $price, $itemtype, $itemstatustype,$currentDate,null);
        }

        $item->save();
        header("location: shop-item.php?id=".$item->getId());
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
        $item = new Item($_GET["id"]);
        if($item != null){

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
                <div class="card-header">Create Item
                    <?php
                    if(isset($item)) {
                        ?>
                        <form method="post" class="pull-right">
                            <button type="submit" name="btnDelete" class="btn btn-danger" value="<?php echo $item->getId(); ?>">Delete</button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control" id="itemname" name="itemname" type="text" placeholder="Item Name" value="<?php if(isset($item)) echo $item->getName() ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Item Description"><?php if(isset($item)) echo $item->getDescription() ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="itemtype">Type</label>
                                    <select class="form-control" name="itemtype">
                                        <?php
                                        if(isset($item)) {
                                            $itemType = new Itemtype($item->getItemTypeId());
                                            ?>
                                            <option value="<?php echo $itemType->getId() ?>"><?php echo $itemType->getName() ?></option>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <option value="0">--Select Type--</option>
                                            <?php
                                        }
                                        $itemTypeList = Itemtype::loadall();
                                        if(!empty($itemTypeList)){
                                            foreach ($itemTypeList as $it) {
                                                if(isset($item) && $it->getId() == $item->getItemTypeId()){
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
                                <div class="col-md-6">
                                    <label for="statustype">Status</label>
                                    <select class="form-control" name="itemstatustype">

                                        <?php
                                        if(isset($item)) {
                                            $itemStatusType = new Itemstatustype($item->getItemStatusTypeId());
                                            ?>
                                            <option value="<?php echo $itemStatusType->getId() ?>"><?php echo $itemStatusType->getName() ?></option>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <option value="0">--Select Status--</option>
                                            <?php
                                        }
                                        $itemStatusTypeList = Itemstatustype::loadall();
                                        if(!empty($itemStatusTypeList)){
                                            foreach ($itemStatusTypeList as $ist) {
                                                if(isset($item) && $ist->getId() == $item->getItemStatusTypeId()){
                                                    //skipp
                                                }
                                                else{
                                                    ?>
                                                    <option value="<?php echo $ist->getId() ?>"><?php echo $ist->getName() ?></option>
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
                                    <label for="imgurl">Image Url</label>
                                    <input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url" value="<?php if(isset($item)) echo $item->getImgUrl() ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="price">Price</label>
                                    <input class="form-control" id="price" name="price" type="text" placeholder="$ 0.00" value="<?php if(isset($item)) echo $item->getPrice() ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($item)){
                            ?>
                            <input type="hidden" name="hfCreateDate" value="<?php echo $item->getCreateDate(); ?>">
                            <button name="btnEdit" type="submit" class="btn btn-primary btn-block" value="<?php echo $item->getId(); ?>">Edit Item</button>
                            <?php
                        }
                        else{
                            ?>
                            <button type="submit" class="btn btn-primary btn-block">Create Item</button>
                            <?php
                        }
                        ?>
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

