<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Connecting to database

$mysqli = new mysqli("localhost", "id3271632_meiemaaadmin", "Admin", "id3271632_meiemaa");

if(!$mysqli){

die($mysqli->connect_error);

}else{
    echo "edukalt connection loodud";
}

?>