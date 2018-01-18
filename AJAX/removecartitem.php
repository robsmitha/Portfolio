<?php
include_once("../DAL/cartitem.php");
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        Cartitem::remove($_GET["id"]);
    }
}

?>