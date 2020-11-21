<?php
    require("includes.php");
    require(ROOT . "session.php");
    include(CONFIG . "config.php");
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">';
    echo "<div class='w3-container'>";
    $sql = "SELECT * FROM announce ORDER BY time DESC LIMIT 3";
    if($conn){
        $result = $conn->query($sql);
            foreach($result as $res){
                echo "<div class='w3-panel w3-metro-red'>";
                echo "<p>";
                echo "Info - " . $res["time"] . " | " . $res["text"];
                echo "</p>";
                echo "</div>";
            }
    }
    echo "</div>";
    echo "Sumary page for " . $_SESSION["username"];

    if(isset($_GET["page"])){
        header('Location: '.$_GET["page"]);
    }else{
        
    }
?>