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
	  Registreeri!
	  <?php


//This function will display the registration form




$date = date('D, M, Y');

echo "<form action='?act=register' method='post'>"

."Kasutajanimi: <input type='text' name='username' size='30'><br>"

."Parool: <input type='password' name='password' size='30'><br>"

."Korda Parooli: <input type='password' name='password_conf' size='30'><br>"

."Email: <input type='text' name='email' size='30'><br>"

."<input type='hidden' name='date' value='$date'>"

."<input type='submit' name='submit' value='Registreeri'>"

."</form>";





//This function will register users data


if(isset($_POST["submit"])){

include("connect.php");


//Collecting info

$username = $_POST['username'];

$password = $_POST['password'];

$pass_conf = $_POST['password_conf'];

$email = $_POST['email'];

$date = $_POST['date'];


//Here we will check do we have all inputs filled


if(empty($username)){

die("Sisesta kasutajanimi!<br>");

}


if(empty($password)){

die("Sisesta parool!<br>");

}


if(empty($pass_conf)){

die("Korda parooli!<br>");

}


if(empty($email)){

die("Sisesta email!");

}


//Let's check if this username is already in use


$user_check = $mysqli->query("SELECT kasutajanimi FROM kasutajad WHERE kasutajanimi='$username'");

$do_user_check = $user_check->fetch_array();


//Now if email is already in use


$email_check = $mysqli->query("SELECT email FROM kasutajad WHERE email='$email'");

$do_email_check = $email_check->num_rows;


//Now display errors


if($do_user_check > 0){

die("Kasutajanimi juba kasutusel!<br>");

}


if($do_email_check > 0){

die("Email juba kasutusel!");

}


//Now let's check does passwords match


if($password != $pass_conf){

die("Paroolid ei klapi!");

}



//If everything is okay let's register this user


$insert = $mysqli->query("INSERT INTO kasutajad (kasutajanimi, parool, email, kuupaev) VALUES ('$username', '$password', '$email', '$date')");

if(!$insert){

die("There's little problem: ".$mysqli->error);

}


echo $username.", sa oled registreeritud. Aitäh!<br><a href=login.php>Logi sisse</a> | <a href=index.php>Pealeht</a>";


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