<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId();
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $itemid = $_GET["id"];
        $item = new Item($itemid);
        if($item != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["btnAddToCart"])){
        $itemid = $_POST["hfItemId"];
        $itemtypeid = $_POST["hfItemTypeId"];
        switch($itemtypeid){
            case 1: $startdate = $enddate = null;
                break;
            case 2: $startdate = $_POST["ItemStartDate"]; $enddate = $_POST["ItemEndDate"];
                break;
            case 3: $startdate = $_POST["ItemStartDate"]; $enddate = $_POST["ItemEndDate"];
                break;
            default: $startdate = $enddate = null;
                break;
        }
        $currentDate = date('Y-m-d H:i:s');
        $foundcart = Cart::loadbycustomerid($customerId);
        //do cart search with customer id
        $cartid = 0;
        if($foundcart != null){
            //use this cart id for item;
            $cartid = $foundcart->getId();

            $cartitem = new Cartitem(0,$cartid,$itemid, $currentDate,1,$startdate,$enddate,$itemtypeid);
            $cartitem->save();
            header("location: online-cart.php?id=$cartid");
        }
        else{
            //add item to cart
            $activecartid = 1;
            $cart = new Cart(0,$customerId,$activecartid, $currentDate, null);
            $cart->save();
            $cartid = $cart->getId();

            $cartitem = new Cartitem(0,$cartid,$itemid, $currentDate,1,$startdate,$enddate,$itemtypeid);
            $cartitem->save();
            header("location: online-cart.php?id=$cartid");
        }
    }
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

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Shop Name</h1>
            <div class="list-group">
                <?php
                $itemTypeList = Itemtype::loadall();
                if(!empty($itemTypeList)){
                    foreach ($itemTypeList as $itemtype){
                        if($itemtype->getId() == $item->getItemTypeId()){
                            ?>
                            <a href="shop-home.php?id=<?php echo $itemtype->getId() ?>" class="list-group-item active"><?php echo $itemtype->getName() ?></a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="shop-home.php?id=<?php echo $itemtype->getId() ?>" class="list-group-item"><?php echo $itemtype->getName() ?></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!--<div id="alertAddedToCart" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->
            <div class="card mt-4">
                <a id="<?php echo $item->getId(); ?>" data-toggle="modal" data-target=".bd-example-modal-lg" class="d-block mb-4 h-100" onclick="showdiv(this.id)" title="<?php echo $item->getName(); ?>">
                    <img id="img<?php echo $item->getId(); ?>" class="card-img-top img-fluid" src="<?php echo $item->getImgUrl() ?>" alt="<?php echo $item->getDescription() ?>">
                </a>
                <div class="card-body">
                    <h3 class="card-title"><?php echo $item->getName() ?></h3>
                    <h4>$<?php echo $item->getPrice() ?></h4>
                    <p class="card-text"><?php echo $item->getDescription() ?></p>

                    <?php
                    $i = 0;
                    while ($i < $item->getRating()){
                        ?>
                    <span class="text-warning"> &#9733;</span>
                    <?php
                        $i++;
                    }
                    echo $i
                    ?>
                     stars
                    <hr>
                    <?php if($customerId > 0) {
                        ?>
                        <script>
                            function doValidation() {
                                var isValid = true;
                                var startdate = $("#ItemStartDate").val();
                                var enddate = $("#ItemEndDate").val();
                                if(startdate.length > 0){
                                    $("#ItemStartDate").addClass("is-valid");
                                    $("#ItemEndDate").addClass("is-valid");
                                }
                                else {
                                    isValid = false;
                                    $("#ItemStartDate").addClass("is-invalid");
                                    $("#ItemEndDate").addClass("is-invalid");
                                }
                                if(enddate.length > 0){
                                    $("#ItemStartDate").addClass("is-valid");
                                    $("#ItemEndDate").addClass("is-valid");
                                }
                                else{
                                    isValid = false;
                                    $("#ItemStartDate").addClass("is-invalid");
                                    $("#ItemEndDate").addClass("is-invalid");
                                }
                                return isValid;
                            }
                            function hideAll() {
                                $("#divItemStartDate").hide();
                                $("#divItemEndDate").hide();
                            }
                            $(document).ready(function(){
                                hideAll();
                                switch (<?php echo $item->getItemTypeId() ?>){
                                    case 1:
                                        break;
                                    case 2:
                                        $("#divItemStartDate").show();
                                        $("#divItemEndDate").show();
                                        break;
                                    case 3:
                                        $("#divItemStartDate").show();
                                        $("#divItemEndDate").show();
                                        $("#ItemStartDate").attr("disabled", "true");
                                        $("#ItemEndDate").attr("disabled", "true");
                                        break;
                                    default:
                                        break;
                                }
                            });
                        </script>
                        <form method="post" onsubmit="if(<?php echo $item->getItemTypeId(); ?> == 2) return doValidation()">
                            <input type="hidden" name="hfItemId" value="<?php echo $item->getId(); ?>">
                            <input type="hidden" name="hfItemTypeId" value="<?php echo $item->getItemTypeId(); ?>">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group" id="divItemStartDate">
                                        <div class="input-group-addon">Start Date</div>
                                        <input type="date" name="ItemStartDate" id="ItemStartDate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group" id="divItemEndDate">
                                        <div class="input-group-addon">End Date</div>
                                        <input type="date" name="ItemEndDate" id="ItemEndDate" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="btn-group">
                                <button class="btn btn-primary" onclick="addToCart();return false;"><i class="icon-plus"></i> Add</button>
                                <button type="submit" name="btnAddToCart" id="btnAddToCart" class="btn btn-default"><i class="icon-arrow-right-circle"></i> Add & Checkout</button>
                            </div>
                        </form>
                        <?php
                    }
                    else{
                        ?>
                        <a class="btn btn-primary pull-right" href="login.php"><i class="icon-login"></i> Login</a>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">
                    <h4>Coming Soon!</h4>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                    <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                    <hr>
                    <a href="#" class="btn btn-success">Leave a Review</a>-->
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>
<script>
    function addToCart() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cartCounter").innerText = this.responseText;
                $('#myModal').modal('show');
                //$("#alertAddedToCart").removeClass("hidden");
            }
        };
        xhttp.open("GET", "AJAX/addcartitem.php?id=<?php echo $item->getId() ?>&itid=<?php echo $item->getItemTypeId() ?>&istid=<?php echo $item->getItemStatusTypeId() ?>", true);
        xhttp.send();
    }
</script>
<script>
    function showdiv(e) {
        var imgid = "img" + e;
        var imgsrc = document.getElementById(imgid).getAttribute("src");
        var description = document.getElementById(imgid).getAttribute("alt");
        var name = document.getElementById(e).getAttribute("title");
        $("#imgModal").attr("src", imgsrc);
        document.getElementById("lblName").innerText = name;
        document.getElementById("lblDescription").innerText = description;
    }
</script>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img id="imgModal" class="img-fluid img-thumbnail" src="" alt="">
            <div class="modal-body">
                <h3 id="lblName"></h3>
                <p id="lblDescription"></p>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo $item->getName() ?> Added To Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="card-img-top img-fluid" src="<?php echo $item->getImgUrl() ?>" alt="<?php echo $item->getName() ?>">
                <p><?php echo $item->getDescription() ?></p>
            </div>
            <div class="modal-footer">
                <a href="online-cart.php" class="btn btn-primary">Checkout Now</a>
                <button type="button" class="btn btn-secondary" onclick="location.reload()">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
