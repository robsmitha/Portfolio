<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $order = new Order($_GET["id"]);
        if($order != null){
            if($order->getCustomerId() == $customerId || $securityuserid > 0){

            }
            else{
                header("location: index.php");
            }
        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$orderItemList = Orderitem::loadbyorderid($order->getId());
$customer = new Customer($order->getCustomerId());
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body>

<!-- Navigation -->
<?php include "navbar.php" ?>

<!-- Page Content -->
<div class="container">

    <h1 class="mt-4 mb-3">View Order ID: <?php echo $order->getId() ?></h1>


    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="customer-profile.php"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></a>
        </li>
        <li class="breadcrumb-item active">View Order ID: <?php echo $order->getId() ?></li>
    </ol>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Order Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Order ID: </b>
                            <?php echo $order->getId() ?>
                        </div>
                        <div class="col-md-4">
                            <b>Customer ID: </b>
                            <?php echo $order->getCustomerId() ?>
                        </div>
                        <div class="col-md-4">
                            <b>Order Status: </b>
                            <?php echo $order->getOrderStatusTypeId() ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Amount: </b>
                            <?php echo "$".number_format(($order->getStripeAmount()/100),2) ?>
                        </div>
                        <div class="col-md-8">
                            <b>Order Date: </b><?php echo date_format(date_create($order->getOrderDate()), 'g:ia \o\n l jS F Y') ?>
                        </div>
                    </div>
                    <br>
                    <div class="row d-none">
                        <div class="col-md-4">
                            <b>Stripe Customer: </b><br>
                            <?php echo $order->getStripeCustomer() ?>
                        </div>
                        <div class="col-md-4">
                            <b>Stripe Card: </b><br>
                            <?php echo $order->getStripeCard() ?>
                        </div>
                        <div class="col-md-4">
                            <b>Stripe Charge: </b><br>
                            <?php echo $order->getStripeCharge() ?>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead class="bg-secondary">
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
