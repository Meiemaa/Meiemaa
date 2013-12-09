 <meta content="text/html; charset=ISO-8859-1"
<?php


session_start();


//This function will destroy your session

session_destroy();

echo "Oled välja logitud! <a href=index.php>Pealeht</a> or <a href=login.php>Logi sisse</a>";


?>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
