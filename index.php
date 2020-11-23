<?php
    require("session.php");
    require("core/includes.php");
    include(CONFIG . "/config.php");
<<<<<<< HEAD
    
    if(isset($_GET["start"])){
        $devId = 1010101101;
        $sql = "SELECT * FROM accounts WHERE device_id='" . $devId . "'";
        if($conn){
            $result = $conn->query($sql);
            if($result){
                foreach($result as $res){
                // store user data
                $_SESSION["username"] = $res["username"];
                $_SESSION["acc_id"] = $res["id"];
                $_SESSION["rank"] = $res["rank"];
                $_SESSION["warehouse"] = $res["warehouse"];
                }    
            }else{
                // force user to register with this devId
                //header('Location: register.html');
            }
        }
        header('Location: index.html');
=======
    $check = false;
    if(isset($_GET["start"])){
        $devId = $_GET["start"];
        $sql = "SELECT * FROM accounts WHERE device_id='" . $devId . "'";
        if($conn){
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                foreach($result as $res){
                // store user data
                    $_SESSION["username"] = $res["username"];
                    $_SESSION["acc_id"] = $res["id"];
                    $_SESSION["rank"] = $res["rank"];
                    $_SESSION["warehouse"] = $res["warehouse"];
                    //$row has some value rather than null
                }    
                header('Location: index.html');
            }else{
                // force user to register with this devId
                //header('Location: register.html');
                echo "<table>";
                echo "<th>REGISTER</th>";
                echo "<tr><td colspan='2'>" . $_GET["start"] . "</tr>";
                echo "<tr><td>ИМЕ: </td><td><input type='text' id='username'></input></td></tr>";
                echo "<tr><td>ПРЕЗИМЕ: </td><td><input type='text' id='surname'></input></td></tr>";
                echo "<tr><td colspan='2'><input type='button' value='REGISTER'></input></td></tr>";
                echo "</table>";
            }
        }
        
    }
    if(isset($_GET["register"])){

>>>>>>> main
    }
    
?>