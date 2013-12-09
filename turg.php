
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
	  Tere tulemast turule! , Siin sa saad müüa oma asju, hetkel on võimalik müüa meile puitu! <br/>
	  <?
	  // Turg
	  if(isset($_POST["muu"])){
	  $puid = $row2["puid"];
	  $m88mispuiduarv = $_POST["muupuitu"];
	  $rahasaad = $m88mispuiduarv * 3;
	  $rahatk = 3;
	  	  if ($puid <= "0"){
	  echo "Sa ei saa müüa negatiivset arvu puitu! Ega rohkem kui sul on!<br/>";
				      }
	  if ($puid > "0"){
	  if ($puid >= $m88mispuiduarv){
	  echo"Müüsid $m88mispuiduarv puitu ja said $rahasaad eurot!<br/>";
	  mysql_query("UPDATE kasutajad SET puid = puid - $m88mispuiduarv WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
	  mysql_query("UPDATE kasutajad SET raha = raha + $rahasaad WHERE kasutajanimi='".$id."' LIMIT 1") or die(mysql_error());
	  }
	                  }
	                           }
	  ?>
	  
	  Puid:<? echo"$row2[puid]";?> <br/>Müü:
	  <form action="" method="POST">
	  <input type="text" name="muupuitu"><input type="submit" name="muu" value="Müü">
	  </form>
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