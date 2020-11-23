<<<<<<< HEAD
=======
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
text {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
</style>
>>>>>>> main
<?php
    require("includes.php");
    require(ROOT . "session.php");
    include(CONFIG . "config.php");
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
<<<<<<< HEAD
    $wh = array("NULL","ONE","TWO","THREE","FOUR","FIVE");
    echo "Welcome " . $_SESSION["username"] . "<br>";
    echo "Warehouse: " . $wh[$_SESSION["warehouse"]] . "<br>";
    $count = 9;
    echo '<a href="../core/main.php?page=notifications.php"><base target="mainFr"><p>Notifications <span class="w3-badge w3-red">' . $count . '</span></p></a>';
=======
    $wh = array("NULL","ПЪРВИ","ВТОРИ","ТРЕТИ","ЧЕТВЪРТИ","ПЕТИ","КЛЕТКИ");
    echo "<ul>";
    echo '<li><a href="../core/main.php?page=account.php"><base target="mainFr">Потребител [> ' . $_SESSION["username"] . ' <]</a></li>';
    echo "<li><text>Склад: " . $wh[$_SESSION["warehouse"]] . "</text></li>";
    $count = 9;
    echo '<li><a href="../core/main.php?page=notifications.php"><base target="mainFr">Известия: ' . $count . '</a></li>';
    echo "</ul>";
>>>>>>> main
?>