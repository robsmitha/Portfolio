<?php
require_once('./config.php');
require_once('../DAL/customer.php');
require_once('../DAL/cart.php');
require_once('../DAL/cartitem.php');
require_once('../DAL/onlinecart.php');
require_once('../DAL/order.php');
require_once('../DAL/orderitem.php');
require_once('../DAL/orderstatustype.php');

$currentDate = date('Y-m-d H:i:s');
$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];
$custlookup = Customer::lookup($email);
if($custlookup != null){
    $cart = Cart::loadbycustomerid($custlookup->getId());
}
else{
    header("location: ../online-cart.php");
}
$amount = Onlinecart::calculatetotal($cart->getId())."00";
//update cart
$cart->setCartStatusTypeId(2);  //inactive cart
$cart->setCheckoutDate($currentDate);
$cart->save();
/*
$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => $amount,
    'currency' => 'usd'
));
$stripecharge = $charge->id;    //charge id we will store
$stripecustomer = $charge->customer;    //stripe customer id
$card = $charge->source;  //grab card obj
$stripecard = $card->id;
$stripeamount =  $charge->amount;     //charge amt we will store

$status = $charge->status;  //if succeeded or not

//pull these fields from card

$brand = $card->brand;    //brand
$exp_month = $card->exp_month;    //exp month
$exp_year = $card->exp_year;  //exp yeat
$last4 = $card->last4;    //last 4
$brand = $card->brand; //brand (VISA)
*/
$stripecharge = null;
$stripecustomer = null;
$stripecard = null;
//make order
$order = new Order(0,$custlookup->getId(),1,$currentDate,$stripecharge,$stripecustomer,$stripecard,$amount);
$order->save();

$cartItemList = Cartitem::loadbycartid($cart->getId());
if(!empty($cartItemList)){
    foreach ($cartItemList as $cartitem) {
        $orderitem = new Orderitem(0,$order->getId(),$cartitem->getItemId(),$cartitem->getQuantity(), $cartitem->getItemStartDate(),$cartitem->getItemEndDate(),$cartitem->getItemTypeId());
        $orderitem->save();
    }
}

header("location: ../checkout-complete.php?id=".$order->getId());
?>