
<?php


//This will start a session

session_start();
include("connect.php");


$username = $_SESSION['username'];

$password = $_SESSION['password'];
$id = $_SESSION["username"];
$user_check = $mysqli->query("SELECT * FROM `kasutajad` WHERE `kasutajanimi`='".$id."'") or die($mysqli->error);
    $row2 = $user_check->fetch_assoc();



//Check do we have username and password
$oigused = $row2["oigused"];
if ($oigused =! "Omanik"){
echo "Te ei ole omanik ja teil pole siia leheküljele mitte mingisuguseid õigusi! Käige minema!";
header('Location: game.php');   
}
else if(!$username && !$password){

echo "Tere külaline! Enne mängimist pead sisse <br> <a href=login.php>logima!</a> või <a href=register.php>Registreerima</a>";
die();
}
else{







?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>



<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
 <link rel="stylesheet" type="text/css" href="cb_style.css">

<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="chatbox.js"></script>
<style>
.message {
   overflow:hidden;
   width:498px;
   margin-bottom:5px;
   border:1px solid #999;
}
.messagehead {
   overflow:hidden;
   background:#FFC;
   width:500px;
}
.messagecontent {
   overflow:hidden;
   width:496px;
}
</style>
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
    <?php
		include("gamemenu.php");
	?>
      <td style="width: 606px; height: 219px;">
	  <center>
	 <?php
	 include("adminshowmessages.php");
		include("chat.php");
	?>
		  <?php
	  // Turg
	  if(isset($_POST["bann"])){
	  $usertoban = $_POST["banuser"];
      $test = "";
	  $bannednow = 1;
	  if ($usertoban =! $test){
	  echo"Kasutaja $usertoban on edukalt bännitud! Mwhahahah!<br/>";
	  $mysqli->query("UPDATE kasutajad SET banned = banned + $bannednow  WHERE kasutajanimi='".$usertoban."' LIMIT 1") or die(mysql_error());
	  }
	                  }
	  ?>
	<br/>
		Pane tondile bänni lihtsalt kirjutades siia tema kasutajanime:
	  <form action="" method="POST">
	  <input type="text" name="banuser"><input type="submit" name="bann" value="Bänn!">
	  </form>
	
	  </td>
      <td style="width: 133px; height: 219px;">
	<?php
		include("andmed.php");
	?>
	</center>
	  </td>
    </tr>
	<table style="text-align: left; width: 864px; height: 42px;"
 border="3" cellpadding="2" cellspacing="2" bgcolor="white">
	<tbody>
	<tr>
	  <td><?php include("footer.php"); ?></td>
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

<?php
}
?>