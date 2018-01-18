<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId();
$cart = Cart::loadbycustomerid($customerId);
if($cart != null){
    $cartItemList = Onlinecart::loadbycartid($cart->getId());
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
    <?php if(isset($validationMsg)) { ?>
        <div class="alert alert-danger alert-dismissible fade show mx-auto mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4> <?php  echo $validationMsg; ?> </h4>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    My Cart
                </div>
                <div>
                    <table class="table">
                        <thead class="bg-secondary">
                        <tr>
                            <th>Item</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($cartItemList)){
                            $totalprice = 0;
                            foreach ($cartItemList as $c) {
                                $totalprice += $c->getPrice();
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <img class="d-flex mr-3 mx-auto" style="width: 75px; height: 75px;" src="<?php echo $c->getImgUrl() ?>" alt="<?php echo $c->getItemName() ?>">
                                        <h5><?php echo $c->getItemName() ?></h5>
                                        <small class="d-none"><?php echo $c->getItemDescription() ?></small>
                                    </td>
                                    <td><?php echo $c->getItemType() ?></td>
                                    <td><?php echo $c->getQuantity() ?></td>

                                    <td>$&nbsp;<?php echo $c->getPrice() ?></td>
                                    <td><?php echo $c->getItemStartDate() ?></td>
                                    <td><?php echo $c->getItemEndDate() ?></td>
                                    <td>
                                        <a class="btn btn-link" id="<?php echo $c->getCartItemId() ?>" onclick="removeItem(this.id)" title="Remove item from cart"><i class="icon-close"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?php if(!empty($cartItemList)) { ?>
                        <b>Total: </b>$ <?php echo $totalprice ?>
                        <?php require_once('Stripe/config.php'); ?>

                        <form action="Stripe/charge.php" method="post" class="pull-right">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="<?php echo $stripe['publishable_key']; ?>"
                                    data-name="Checkout Now"
                                    data-image="http://dl.hiapphere.com/data/icon/201711/jp.snowlife01.android.applockpro_HiAppHere.com.png"
                                    data-amount="<?php echo $totalprice."00" ?>"
                                    data-locale="auto"></script>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<?php include "footer.php" ?>

<!-- Bootstrap core JavaScript -->
<?php include "scripts.php" ?>
<script>
    function removeItem(e) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "AJAX/removecartitem.php?id=" + e, true);
        xhttp.send();
    }
</script>
</body>

</html>
