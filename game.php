
<?php


//This will start a session

session_start();
include("connect.php");


$username = $_SESSION['username'];

$password = $_SESSION['password'];
$id = $_SESSION["username"];
$user_check = mysql_query("SELECT * FROM `kasutajad` WHERE `kasutajanimi`='".$id."'") or die(mysql_error());
    $row2 = mysql_fetch_assoc($user_check);



//Check do we have username and password

if(!$username && !$password){

echo "Tere külaline! Enne mängimist pead sisse <br> <a href=login.php>logima!</a> või <a href=register.php>Registreerima</a>";
break;

}else{







?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>



<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
 <link rel="stylesheet" type="text/css" href="cb_style.css">

<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="chatbox.js"></script>
  <title></title>
</head>
<body background="/img/background.jpg">
<center>

  
    
      
   
  

<br>
<table style="text-align: left; width: 864px; height: 268px;"
 border="3" cellpadding="2" cellspacing="2" bgcolor="white">
  <tbody>
    <tr>
	  <img src="/img/meiemaa.jpg" alt="meiemaa"></br>
      <td style="height: 33px;"><img src="/img/menu.jpg" alt="menu"></br></td>
      <td style=" height: 33px;"></td>
      <td style="height: 33px;"><img src="/img/andmed.jpg" alt="andmed"></br></td>
    </tr>
    <?
		include("gamemenu.php");
	?>
      <td style="width: 606px; height: 219px;">
	  


<body onbeforeunload="signInForm.signInButt.name='signOut';signInOut()" onload="hideShow('hide')">

<h1>Chat Box</h1>
<form onsubmit="signInOut();return false" id="signInForm">
	<input id="userName" type="text">
	<input id="signInButt" name="signIn" type="submit" value="Sign in">
	<span id="signInName">User name</span>
	</form>

	<div id="chatBox"></div>
	<div id="usersOnLine"></div>
	<form onsubmit="sendMessage();return false" id="messageForm">
		<input id="message" type="text">
		<input id="send" type="submit" value="Send">
<div id="serverRes"></div></form>
	  </td>
      <td style="width: 133px; height: 219px;">
	<?
		include("andmed.php");
	?>
	  </td>
    </tr>
	<table style="text-align: left; width: 864px; height: 42px;"
 border="3" cellpadding="2" cellspacing="2" bgcolor="white">
	<tbody>
	<tr>
	  <td>&copy; Ivar Äkke. Meiemaa!</td>
	</tr>
	</tbody>
	</table>
  </tbody>
  
</table>
<br>

<br>
</center>
</body>




</html>

<?
}
?>