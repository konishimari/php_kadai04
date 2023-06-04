<?php

session_start();
echo $_SESSION["name"];
echo "<br>";
echo $_SESSION["cnt"];
echo "<br>";
echo session_id();

?>