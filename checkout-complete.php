<?php include "classes.php" ?>
<?php
require_once('Stripe/config.php');
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"])){
        $order = new Order($_GET["id"]);
        $customer = new Customer($order->getCustomerId());
        $orderItemList = Orderitem::loadbyorderid($order->getId());
    }
    else{
        header("location: index.php");
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
    <h1 class="mt-4 mb-3">Checkout Complete <small>Thank you for your purchase!</small></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Checkout Complete</li>
    </ol>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                We sent an order confirmation email to <?php echo $customer->getEmail() ?>.
            </div>
            <div class="card">
                <div class="card-header">
                    Order Details
                    <br>
                    <small>
                    <?php echo date_format(date_create($order->getOrderDate()), 'g:ia \o\n l jS F Y') ?></small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Order Id: </b>
                            <?php echo $order->getId(); ?>
                        </div>
                        <div class="col-md-4">
                            <b>Ordered placed by: </b>
                            <?php echo $customer->getFirstName()." ".$customer->getLastName(); ?>
                        </div>
                        <div class="col-md-4">
                            <b>Total</b>
                            <?php echo "$".number_format(($order->getStripeAmount()/100),2); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(!empty($orderItemList)){
                                $totalprice = 0;
                                foreach ($orderItemList as $orderitem){
                                    $item = new Item($orderitem->getItemId());
                                    $totalprice += $item->getPrice();
                                    ?>
                                    <tr>
                                        <th><?php echo $item->getName() ?></th>
                                        <th><?php echo $orderitem->getQuantity() ?></th>
                                        <th><?php echo "$".$item->getPrice().".00" ?></th>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <span class="pull-right">
                        <b>Total</b> $<?php echo $totalprice.".00" ?>
                    </span>
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

</body>

</html>


