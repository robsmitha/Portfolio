<?php
/**
 * Created by PhpStorm.
 * User: robsm_5mj
 * Date: 1/14/2018
 * Time: 10:13 PM
 */
include_once ("../DAL/subscriber.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["email"])){
        $emailaddress = htmlspecialchars($_POST["email"]);
        $subscriber = Subscriber::lookup($emailaddress);
        if($subscriber != null){
            echo "Someone has already used this email address. Please try a different one.";
        }
        else{
            $currentDate = date('Y-m-d H:i:s');
            $subscriber = new Subscriber(0,$emailaddress,$currentDate);
            $subscriber->save();
            echo "Thanks, I'll Keep You Posted!";
        }
    }
    else{
        echo "Something Went Wrong!";
    }
}
else{
    echo "Something Went Terribly Wrong!";
}
?>