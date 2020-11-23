<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
<<<<<<< HEAD
  width: 100%;
  background-color: #f1f1f1;
=======
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  margin: 0px;
>>>>>>> main
}

li a {
  display: block;
<<<<<<< HEAD
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: #555;
  color: white;
=======
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  margin: 0px;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
>>>>>>> main
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