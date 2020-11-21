<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 100%;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: #555;
  color: white;
}
</style>
<?php

require("includes.php");
require(ROOT . "session.php");
include(CONFIG . "config.php");
$sql="SELECT * FROM menu ORDER BY position ASC";


$FRAME = <<<FRAME
<html>
<head>
</head>
<body>
<ul>
FRAME;

if($conn){
    $result = $conn->query($sql);
    if($result){
        foreach($result as $res){
            if($res["access"] <= $_SESSION["rank"]){
                $FRAME .= '<li><a href="../core/main.php?page=' . $res["page"] . '"><base target="' . $res["target"] . '">'. $res["Text"] .'</a></li>';
            }            
        }
        
    }
}

echo $FRAME



?>