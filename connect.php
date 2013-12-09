<?php
//Connecting to database

$connect = mysql_connect("mysql12.000webhost.com", "a9131395_meiemaa", "ivar1999");

if(!$connect){

die(mysql_error());

}


//Selecting database

$select_db = mysql_select_db("a9131395_meiemaa", $connect);

if(!$select_db){

die(mysql_error());

}
?>