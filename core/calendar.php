<script type="text/javascript">
function execute_date(dt,hiden){
    alert("Function is working!!! " + dt);    
<<<<<<< HEAD
}
</script>
=======
    var t = document.getElementById('defHidden');
    if (t.style.display === "none") {
        t.style.display = "block";
        document.getElementById('frame').src = "date_process.php?date=" + dt;
    } else {
        t.style.display = "none";
    }

}
</script>
<style>
#defHidden{
    display: none;
    width: 100%;
    height: 600px;
    background-color: yellow;
}
iframe{
    width: 100%;
    height: 100%;
}
</style>
>>>>>>> main
<?php
 require("includes.php");
 require(ROOT . "session.php");
 include(CONFIG . "config.php");
 echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
 echo '<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
 echo '<link rel="stylesheet" href="../style/calendar.css">'; 


$days_count = date('t');
$start_date_day = date('N',mktime(0, 0, 0, date('m'), 1));
$date = 1;
$MONTH_NAME = date('M Y');
$CURRENT_MONTH = date('m');
$CURRENT_DATE = date('d');
$CURRENT_YEAR = date('Y');
$ACC_ID = $_SESSION["acc_id"];
$WAREHOUSE = $_SESSION["warehouse"];
$ALL_EVENTS = array();
// get all dates for this warehouse
$sql_get_dates = ("SELECT * FROM calendar WHERE warehouse='" . $WAREHOUSE . "' ORDER BY date ASC");
if($conn){
    $result = $conn->query($sql_get_dates);
    if($result){
        foreach($result as $res){
            // convert date string to time and check if is this month then add data to array -> 
            $format = 'Y-m-d H:i:s';
            $date2 = DateTime::createFromFormat($format, $res["date"]);
            //echo "Format: $format; " . $date2->format('Y-m-d H:i:s') . "<br>";
            $year = $date2->format('Y');
            $mon = $date2->format('m');
            $day = $date2->format('d');
            //echo " < " . $day . " > <br>";
            //echo " >>> MONTH >> " . $mon . " curr_month >> " . $CURRENT_MONTH . "<br>"; 
            if($mon == $CURRENT_MONTH and $year == $CURRENT_YEAR){
                $tmp = array($res["id"],$res["date_type"],$res["date_owner_id"],$res["warehouse"],$day);
                array_push($ALL_EVENTS,$tmp);
            }
        }
    }else{
        echo "SQL ERROR";
    }
}
$elements = count($ALL_EVENTS);
echo "<table>";
echo "<tr style='height: 50px;'><td colspan='7' id='month'>" . $MONTH_NAME . "</td></tr>";
<<<<<<< HEAD
echo "<tr id='header' style='height: 50px;'><td>PON</td><td>VT</td><td>SR</td><td>CHET</td><td>PET</td><td>SUB</td><td>NED</td></tr>";
=======
echo "<tr id='header' style='height: 50px;'><td>ПОНЕДЕЛНИК</td><td>ВТОРНИК</td><td>СРЯДА</td><td>ЧЕТВЪРТЪК</td><td>ПЕТЪК</td><td>СЪБОТА</td><td>НЕДЕЛЯ</td></tr>";
>>>>>>> main
// if event is mine <i class='glyphicon glyphicon-user'></i> - icon
// if event is secondShift - span class 'secondShift' type 0
// if event is sunday - span class 'sunday' type 1
// if event is rest day - span class 'restDay' type 2
$msg="";
$mmsg = "";
for($i=1;$i<7;$i++){ // build 5 rows
    echo "<tr>";
    for($y=1;$y<8;$y++){ // build each week
        if($i == 1){ // ako e purvata sedmica
            if($y < $start_date_day ){
                echo "<td></td>";
            }else{
                if($date == $CURRENT_DATE){
<<<<<<< HEAD
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $i .")'><div id='content'><span class='w3-tag w3-large w3-blue'>" . $date . "</span>";
                }else{
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $i .")'><div id='content'><span class='w3-tag w3-large w3-green'>" . $date . "</span>";
=======
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $y .")'><div id='content'><span class='w3-tag w3-large w3-blue'>" . $date . "</span>";
                }else{
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $y .")'><div id='content'><span class='w3-tag w3-large w3-green'>" . $date . "</span>";
>>>>>>> main
                }
                
                for($it=0;$it<$elements;$it++){
                    if($ALL_EVENTS[$it][4] == $date){ // if is current date on counter
                        if($ALL_EVENTS[$it][1] == 0){ // if its type 0
                            echo "<span class='secondShift'>";
<<<<<<< HEAD
                            $msg = "&nbsp;&nbsp;My second shift";
                            $mmsg = "&nbsp;&nbsp;second shift";
                        }elseif($ALL_EVENTS[$it][1] == 1){ // if its type 1
                            echo "<span class='sunday'>";
                            $msg = "&nbsp;&nbsp;My sunday";
                            $mmsg = "&nbsp;&nbsp;sunday";
                        }elseif($ALL_EVENTS[$it][1] == 2){ // if its type 2
                            echo "<span class='restDay'>";
                            $msg = "&nbsp;&nbsp;My resting day";
                            $mmsg = "&nbsp;&nbsp;resting day";
=======
                            $msg = "&nbsp;&nbsp;Моя втора смяна";
                            $mmsg = "&nbsp;&nbsp;Втора смяна на&nbsp;";
                        }elseif($ALL_EVENTS[$it][1] == 1){ // if its type 1
                            echo "<span class='sunday'>";
                            $msg = "&nbsp;&nbsp;Моя неделя";
                            $mmsg = "&nbsp;&nbsp;Неделя на&nbsp;";
                        }elseif($ALL_EVENTS[$it][1] == 2){ // if its type 2
                            echo "<span class='restDay'>";
                            $msg = "&nbsp;&nbsp;мой почивен ден";
                            $mmsg = "&nbsp;&nbsp;Почивен ден на&nbsp;";
>>>>>>> main
                        }

                        if($ALL_EVENTS[$it][2] == $ACC_ID){ // if is my event
                            echo "<i class='glyphicon glyphicon-user'></i>" .$msg;
                        }else{
                            $get_username = "SELECT username FROM accounts WHERE id='" . $ALL_EVENTS[$it][2] . "'";
                            $return = $conn->query($get_username);
                            if($return){
                                foreach($return as $ret){
                                    echo $mmsg . " " . $ret["username"];    
                                }
                            }
                        }
                        echo "</span>";
                    }

                }
                echo "</div></div></td>";
                $date++;
            }
        }else{
            if($date <= $days_count){
                if($date == $CURRENT_DATE){
<<<<<<< HEAD
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $i .")'><div id='content'><span class='w3-tag w3-large w3-blue'>" . $date . "</span>";
                }else{
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $i .")'><div id='content'><span class='w3-tag w3-large w3-green'>" . $date . "</span>";
=======
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $y .")'><div id='content'><span class='w3-tag w3-large w3-blue'>" . $date . "</span>";
                }else{
                    echo "<td><div id='buttons' onclick='execute_date(" . $date . ",". $y .")'><div id='content'><span class='w3-tag w3-large w3-green'>" . $date . "</span>";
>>>>>>> main
                }
                for($it=0;$it<$elements;$it++){
                    if($ALL_EVENTS[$it][4] == $date){ // if is current date on counter
                        if($ALL_EVENTS[$it][1] == 0){ // if its type 0
                            echo "<span class='secondShift'>";
<<<<<<< HEAD
                            $msg = "&nbsp;&nbsp;My second shift";
                            $mmsg = "&nbsp;&nbsp;second shift";
                        }elseif($ALL_EVENTS[$it][1] == 1){ // if its type 1
                            echo "<span class='sunday'>";
                            $msg = "&nbsp;&nbsp;My sunday";
                            $mmsg = "&nbsp;&nbsp;sunday";
                        }elseif($ALL_EVENTS[$it][1] == 2){ // if its type 2
                            echo "<span class='restDay'>";
                            $msg = "&nbsp;&nbsp;My resting day";
                            $mmsg = "&nbsp;&nbsp;resting day";
=======
                            $msg = "&nbsp;&nbsp;Моя втора смяна";
                            $mmsg = "&nbsp;&nbsp;Втора смяна на&nbsp;";
                        }elseif($ALL_EVENTS[$it][1] == 1){ // if its type 1
                            echo "<span class='sunday'>";
                            $msg = "&nbsp;&nbsp;Моя неделя";
                            $mmsg = "&nbsp;&nbsp;Неделя на&nbsp;";
                        }elseif($ALL_EVENTS[$it][1] == 2){ // if its type 2
                            echo "<span class='restDay'>";
                            $msg = "&nbsp;&nbsp;Мой почивен ден";
                            $mmsg = "&nbsp;&nbsp;Почивен ден на&nbsp;";
>>>>>>> main
                        }

                        if($ALL_EVENTS[$it][2] == $ACC_ID){ // if is my event
                            echo "<i class='glyphicon glyphicon-user'></i>" .$msg;
                        }else{
                            $get_username = "SELECT username FROM accounts WHERE id='" . $ALL_EVENTS[$it][2] . "'";
                            $return = $conn->query($get_username);
                            if($return){
                                foreach($return as $ret){
                                    echo $mmsg . " " . $ret["username"];    
                                }
                            }
                        }
                        echo "</span>";
                    }
                    
                }
                echo "</div></div></td>";
                $date++;
            }else{
                echo "<td></td>";
            }
        }
<<<<<<< HEAD
=======
        
>>>>>>> main
    }
    echo "</tr>";
}
echo "</table>";
<<<<<<< HEAD
=======
echo "<span id='defHidden'><iframe id='frame'></iframe></span>";
>>>>>>> main
?>