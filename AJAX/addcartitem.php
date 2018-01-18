<?php
/**
 * Created by PhpStorm.
 * User: robsm_5mj
 * Date: 12/17/2017
 * Time: 1:31 AM
 */
session_start();
include_once("../DAL/onlinecart.php");
include_once("../DAL/cartitem.php");
include_once("../DAL/cart.php");
include_once("../Utilities/SessionManager.php");
$customerId = SessionManager::getCustomerId();
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $itemid = $_GET["id"];
    }
    if(isset($_GET["itid"]) && is_numeric($_GET["itid"]) && $_GET["itid"] > 0){
        $itemtypeid = $_GET["itid"];
    }
    if(isset($_GET["istid"]) && is_numeric($_GET["istid"]) && $_GET["istid"] > 0){
        $itemstatustypeid = $_GET["istid"];
    }
    switch($itemtypeid){
        case 1: $startdate = $enddate = null;
            break;
        case 2: $startdate = null; $enddate = null;
            break;
        case 3: $startdate = null; $enddate = null;
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
    }
    else{
        //add item to cart
        $activecartid = 1;
        $cart = new Cart(0,$customerId,$activecartid, $currentDate, null);
        $cart->save();
        $cartid = $cart->getId();

        $cartitem = new Cartitem(0,$cartid,$itemid, $currentDate,1,$startdate,$enddate,$itemtypeid);
        $cartitem->save();
    }
    echo Onlinecart::getcartcount($cartid);
}
?>