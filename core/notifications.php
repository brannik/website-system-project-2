<script type="text/javascript">
function app(id,id2){
    document.getElementById(id).style.height = "80px"; 
    var element = document.createElement("input");
    element.setAttribute("type", "text");
    element.setAttribute("value", "");
    element.setAttribute("style", "width:98%");
    element.setAttribute("id", "TEXTBOX"); 
    var button = document.createElement("input");
    button.setAttribute("type","button");
    button.setAttribute("value","SEND");    
    button.setAttribute("onclick","send()");
    button.setAttribute("style","width:120px");

    var element2 = document.createElement("input");
    element2.setAttribute("type", "text");
    element2.setAttribute("value", id-1);
    element2.setAttribute("style", "width:2%");
    element2.setAttribute("id", "hid"); 
    element2.setAttribute("hidden","true");

    var foo = document.getElementById(id2);
    foo.appendChild(element);
    foo.appendChild(button);
    foo.appendChild(element2);
    //document.getElementById("TEXTBOX").addEventListener("click",send());
}

function send(){
    var text = document.getElementById("TEXTBOX").value;
    var temp = document.getElementById("hid").value;
    //alert("Message - " + text + " has been send to " + temp);
    window.location.href = "notifications.php?action=5&text=" + text + "&reciev=" + temp;
}

</script>

<?php
    require("includes.php");
    require(ROOT . "session.php");
    include(CONFIG . "config.php");
    echo '<link rel="stylesheet" href="../style/notification.css">'; 
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
    echo "<h1>Notifications</h1>";
    echo '<div class="w3-container">';
    echo "<table>";
    // get all messages to current user and process them [0 for request shift] [1 for request sunday] [2 for message] [3 for system message]
    for($i=1;$i<10;$i++){
        if(($i%2)==0){ // if notification type = 0 aka request
        echo "<tr id='request'>
            <td id='time'><text>Timestamp</text></td>
            <td id='context' colspan='2'><text>From - @name request for (shift[t-0]/sunday[t-1]) - notification type 0 | request type = 0 (not accepted)</text></td>
            <td id='button'><a href='notifications.php?action=0&id=" . $i . "'><base target='mainFr'>ПРИЕМИ</a></td>
            <td id='button'><a href='notifications.php?action=1&id=" . $i ."'><base target='mainFr'>ОТКАЖИ</a></td>
            </tr>";
        }else{ // if notification type = 1 aka message
            echo "<tr id='message'>
            <td id='time'><text>Timestamp</text></td>
            <td id='context'><p style='text-align:left;'>&nbsp;&nbsp;<span class='w3-tag w3-blue'>New!</span>&nbsp;&nbsp;<text>From - @name Message content - notification type 1</text></p></td>
            <td id='button'><a href='notifications.php?action=2&id=" . $i . "'><base target='mainFr'>ПРОЧЕТЕНО</a></td>
            <td id='button'><a href='notifications.php?action=3&id=" . $i ."&target=" . intval($i+1) . "&span=" . intval($i+2) . "'><base target='mainFr'>ОТГОВОР</a></td>
            <td id='button'><a href='notifications.php?action=4&id=" . $i ."'><base target='mainFr'>ИЗТРИИ</a></td>
            </tr><tr id='" . intval($i+1) . "' style='height:0px;'><td colspan='5'><span id='" . intval($i+2) . "'></span></td></tr>";
        }
    }
    
    echo "</table></div>";

    if(isset($_GET["action"]) ){
        if($_GET["action"] == 1){
            echo "Deleting notification with id: " . $_GET["id"];
        }elseif($_GET["action"] == 0){
            echo "Accepting notification with id: " . $_GET["id"];
        }elseif($_GET["action"] == 2){
            echo "Mark message as seen id: " . $_GET["id"];
        }elseif($_GET["action"] == 3){
            echo "Reply to message with id: " . $_GET["id"];
            echo "<script>app(" . $_GET["target"] . "," . $_GET["span"] . ");</script>";
        }elseif($_GET["action"] == 4){
            echo "Delete message with id: " . $_GET["id"];
        }elseif($_GET["action"] == 5){
            echo "{MESSAGE SEND TO} - " . $_GET["reciev"] . " | " . $_GET["text"];
        }
        
    }
    
?>