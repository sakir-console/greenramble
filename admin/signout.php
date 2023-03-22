<?php

setcookie("log", "", time() - (86400 * 30));
 header("refresh:0");
 header("location:myauth.php");


?>