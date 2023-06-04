<?php

session_start();
$_SESSION["name"] = "yama"; 
$_SESSION["cnt"] = 1;
echo "SESSION1:";
echo session_id();

?>