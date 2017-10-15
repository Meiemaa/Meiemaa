<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Meiemaa Old</title>
</head>
<body>
    <center>
    <table style="text-align: left; width: 864px; height: 268px;" border="3" cellpadding="2" cellspacing="2" bgcolor="white">
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



            ?>
             <form action='?act=login' method='post'>
                 Kasutajanimi: <input type='text' name='username' size='30'><br>
                 Parool: <input type='password' name='password' size='30'><br>
                 <input type='submit' name='submit' value='Logi sisse'>
             </form>

            <?php
            if(isset($_POST["submit"])){
                //This function will find and checks if your data is correct




                //Collect your info from login form

                $username = $_POST['username'];

                $password = $_POST['password'];


                include("connect.php");


                //Find if entered data is correct


                $result = $mysqli->query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND parool='$password'");

                $row = $result->fetch_array();

                $id = $row['id'];


                $select_user = $mysqli->query("SELECT * FROM kasutajad WHERE id='$id'");

                $row2 = $select_user->fetch_array();

                $banned = $row2["banned"];
                $user = $row2['kasutajanimi'];


                if($username != $user){

                    die("Sellist kasutajat ei eksisteeri!");

                }



                $pass_check = $mysqli->query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND id='$id'");

                $row3 = $pass_check->fetch_array();

                $email = $row3['email'];

                $select_pass = $mysqli->query("SELECT * FROM kasutajad WHERE kasutajanimi='$username' AND id='$id' AND email='$email'");

                $row4 = $select_pass->fetch_array();

                $real_password = $row4['parool'];

                if ($banned == 1){
                    echo "Te olete bänned! Kaoge siit mängust kus kurat!";
                    header('Location: index.php');
                }
                else if($password != $real_password){

                    die("Vale parool!");

                }
                else
                {



                    //Now if everything is correct let's finish his/her/its login

                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;


                    echo "Edukalt sisse logitud!";
                }
                ?>
                <meta HTTP-EQUIV="REFRESH" content="0; url=game.php">



                <?php

            }
            ?>





            </td>
            <td style="width: 133px; height: 219px;"></td>
            </tr>
            <table style="text-align: left; width: 864px; height: 42px;" border="3" cellpadding="2" cellspacing="2" bgcolor="white">
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