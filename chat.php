<div id="chat" style="width:500px;margin:0 auto;overflow:hidden;">
<div id="messages"></div>
<div id="error" style="width:500px;text-align:center;color:red;"></div>
<div id="write" style="text-align:center;">
<?php
include("connect.php");
if(isset($_POST["send"])){
$name = $row2["kasutajanimi"];
$message = $_POST["message"];
//Check if message is empty and send the error code
if(strlen($message) < 1){
   echo 3;
}
//Check if message is too long
else if(strlen($message) > 255){
   echo 4;
}
//Check if name is empty
else if(strlen($name) < 1){
   echo 5;
}
//Check if name is too long
else if(strlen($name) > 29){
   echo 6;
}
//If everything is fine
else{
   //This array contains the characters what will be removed from the message and name, because else somebody could send redirection script or links
   $search = array("<",">",">","<");
   //Insert a new row in the chat table
   $mysqli->query("insert into chat (time, name, message) values ('" . time() . "', '" . str_replace($search,"",$name) . "', '" . str_replace($search,"",$message) . "')") or die(8);
}
}
?>
<br/>Tekst:
	  <form action="" method="POST">
	  <input type="text" name="message"><input type="submit" name="send" value="Saada">
	  </form>
</div>
</div>