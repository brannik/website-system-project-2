<?php
    require("includes.php");
    require(ROOT . "session.php");
    include(CONFIG . "config.php");
    if($conn){
        $sql="SELECT * FROM accounts";
        $result = $conn->query($sql);
        echo "<ul>";
        foreach($result as $res){
            echo "<li>" . $res["username"];
            echo "</li>";
        }
        echo "</ul>";
    }
?>