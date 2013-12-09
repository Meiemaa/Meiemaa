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
    <tr>
      <td style="width: 133px; height: 219px;">
	 <a href="index.php">Esileht</a></br>
<a href="login.php">Logi Sisse</a></br>
<a href="register.php">Registreeri</a></br>
</td>
      <td style="width: 606px; height: 219px;">
	  <?php

session_start();


//This displays your login form




echo "<form action='?act=login' method='post'>"

."Kasutajanimi: <input type='text' name='username' size='30'><br>"

."Parool: <input type='password' name='password' size='30'><br>"

."<input type='submit' name='submit' value='Logi sisse'>"

."</form>";




if(isset($_POST["submit"])){
//This function will find and checks if your data is correct




//Collect your info from login form

$username = $_REQUEST['username'];

$password = $_REQUEST['password'];


include("connect.php");


//Find if entered data is correct


$result = mysql_query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND parool='$password'");

$row = mysql_fetch_array($result);

$id = $row['id'];


$select_user = mysql_query("SELECT * FROM kasutajad WHERE id='$id'");

$row2 = mysql_fetch_array($select_user);

$user = $row2['kasutajanimi'];


if($username != $user){

die("Sellist kasutajat ei eksisteeri!");

}



$pass_check = mysql_query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND id='$id'");

$row3 = mysql_fetch_array($pass_check);

$email = $row3['email'];

$select_pass = mysql_query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND id='$id' AND email='$email'");

$row4 = mysql_fetch_array($select_pass);

$real_password = $row4['parool'];


if($password != $real_password){

die("Vale parool!");

}




//Now if everything is correct let's finish his/her/its login


session_register("username", $username);

session_register("password", $password);


echo "Edukalt sisse logitud, ".$username." mine  <a href=game.php>mängu!</a>";





}





?> 
	  </td>
      <td style="width: 133px; height: 219px;"></td>
    </tr>
	<table style="text-align: left; width: 864px; height: 42px;"
 border="3" cellpadding="2" cellspacing="2" bgcolor="white">
	<tbody>
	<tr>
	  <td><? include("footer.php"); ?></td>
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