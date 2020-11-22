<?php
require("includes.php");
require(ROOT . "session.php");
include(CONFIG . "config.php");
    if(isset($_GET['date'])){
        echo " >> " . $_GET['date'];
    }
?>