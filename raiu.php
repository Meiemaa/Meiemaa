
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

if(!$username && !$password){

echo "Tere külaline! Enne mängimist pead sisse <br> <a href=login.php>logima!</a> või <a href=register.php>Registreerima</a>";
die();

}else{







?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>



<head>
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
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
	  <script type="text/javascript" src="jquery.js"></script>
	  <?php
	  
	  if(isset($_POST["raiu"])){
	  $puu = $row2["puid"];
	  $lvl = $row2["puulvl"];
	  $lvlsaad = $row2["puulvl"] + 1;
	  $xp = $row2["puuxp"];
	  $randpuud = rand(1,4);
	  $puidsaad = $lvl + $randpuud;
	  $xpsaad = $puidsaad * 5;
	  $xpvaja = $row2["puuxpvaja"];
	  echo"Raidusid $puidsaad puud ja said $xpsaad kogemust!";
	  
	   $mysqli->query("UPDATE kasutajad SET puid = puid + $puidsaad WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
          $mysqli->query("UPDATE kasutajad SET puuxp = puuxp + $xpsaad WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
	   if($xpvaja < $xp){
		echo "Sa saavutasid puuraidumise leveli. Su puuraidumine on nüüd level $lvlsaad";
           $mysqli->query("UPDATE kasutajad SET puulvl = puulvl + 1 WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
           $mysqli->query("UPDATE kasutajad SET puuxpvaja = puuxpvaja + $xp + 300 WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
	  }
	 


	 
	 
	  }
	  ?>
	  
	  <form action="" method="POST">
	  <input type="submit" name="raiu" value="Raiu Puid!" onclick="register()">
	  </form>
	  <?php
		$xpvaja = $row2["puuxpvaja"];
		$xp = $row2["puuxp"];
		$xplvlini = $xpvaja-$xp;
		
		echo "Puid: $row2[puid] </br>";
		echo "Puuraidumise xp: $row2[puuxp] </br>";
		echo "Puuraidumise level: $row2[puulvl] </br>";
		echo "XP levelini: $xplvlini </br>";
	  ?>
	  </td>
      <td style="width: 133px; height: 219px;">
	<?php
		include("andmed.php");
	?>
	  </td>
    </tr>
	<table style="text-align: left; width: 864px; height: 42px;"
 border="3" cellpadding="2" cellspacing="2" bgcolor="white">&copy; 
	<tbody>
	<tr>
	  <td>&<?php include("footer.php"); ?></td>
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