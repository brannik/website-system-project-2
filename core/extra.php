<script type="text/javascript">
    function showHide(element){
        //alert('Is working');
        var x;
        if(element == 1){
           x = document.getElementById('hidden');
        }else{
            x = document.getElementById('hidden2');
        }
         
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<style>
#hidden{
    width: 100%;
    height: 200px;
    display: none;
    background-color: red;
}
#hidden2{
    width: 100%;
    height: 200px;
    display: none;
    background-color: blue;
}
table{
    width: 100%;
}
</style>
<?php
require("includes.php");
require(ROOT . "session.php");
include(CONFIG . "config.php");
$days_count = 10;
$hours_count = 15;
if(isset($_GET["action"])){
    if($_GET["action"] == "info"){
        echo "Общо - часове - дни: " . $_SESSION["username"];
        echo "<table>";
        echo "<tr>";
        echo "<td><span onclick='showHide(1)'>Часове: </span></td><td>" . $hours_count . "</td>";
        echo "</tr><tr><td colspan='2'>";
        echo "<span id='hidden'>Display full list of days -> order by date</span>";
        echo "</td></tr><tr>";
        echo "<td><span onclick='showHide(2)'>Дни: </span></td><td>" . $days_count . "</td>";
        echo "</tr><tr><td colspan='2'>";
        echo "<span id='hidden2'>Display full list of days -> order by date</span>";
        echo "</td></tr></table>";
    }elseif($_GET["action"] == "add"){
        echo "Add new extra for user for user: " . $_SESSION["username"];
    }elseif($_GET["action"] == "delete"){
        echo "Delete extra for user: " . $_SESSION["username"];
    }
}
    
?>