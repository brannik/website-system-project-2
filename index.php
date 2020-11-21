<?php
    require("session.php");
    require("core/includes.php");
    include(CONFIG . "/config.php");
    
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
    }
    
?>