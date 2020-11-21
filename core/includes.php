<?php
$tmpROOT = $_SERVER["DOCUMENT_ROOT"];
define("ROOT",$tmpROOT . "/");
define("SCRIPTS",$tmpROOT . "/scripts/");
define("CORE",$tmpROOT ."/core/");
define("STYLE",$tmpROOT . "/style/");
define("CONFIG",$tmpROOT . "/config/");

// database states and types
define("TYPE_REQ_SHIFT",0);
define("TYPE_REQ_SUNDAY",1);
define("TYPE_MESSAGE",2);
define("TYPE_MESSAGE_SYSTEM",3);

define("STATE_REQ_PENDING",0);
define("STATE_REQ_ACCEPTED",1);
define("STATE_REQ_DECLINED",2);

define("STATE_MSG_UNSEEN",0);
define("STATE_MSG_SEEN",1);

?>