<?php
//Connecting to database

$mysqli = new mysqli("localhost", "root", "", "old_meiemaa");

if(!$mysqli){

die($mysqli->connect_error);

}

?>