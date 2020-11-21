<?php
    require("includes.php");
    require(ROOT . "session.php");
    include(CONFIG . "config.php");
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
    $wh = array("NULL","ONE","TWO","THREE","FOUR","FIVE");
    echo "Welcome " . $_SESSION["username"] . "<br>";
    echo "Warehouse: " . $wh[$_SESSION["warehouse"]] . "<br>";
    $count = 9;
    echo '<a href="../core/main.php?page=notifications.php"><base target="mainFr"><p>Notifications <span class="w3-badge w3-red">' . $count . '</span></p></a>';
?>