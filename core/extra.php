<?php
require("includes.php");
require(ROOT . "session.php");
include(CONFIG . "config.php");
if(isset($_GET["action"])){
    if($_GET["action"] == "info"){
        echo "Information for user: " . $_SESSION["username"];
    }elseif($_GET["action"] == "add"){
        echo "Add new extra for user for user: " . $_SESSION["username"];
    }elseif($_GET["action"] == "delete"){
        echo "Delete extra for user: " . $_SESSION["username"];
    }
}
    
?>