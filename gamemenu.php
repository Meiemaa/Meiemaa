<tr>
      <td style="width: 133px; height: 219px;">
	  <a href="game.php">Pealeht</a></br>
	  <a href="turg.php">Mine turule</a></br>
	  <a href="raiu.php">Mine metsa</a></br>
	 <a href="logout.php">Logi Välja</a></br>
	 
	 <?php
	 $oigused = $row2["oigused"];
	 if ($oigused = "Omanik"){
	 echo "<a href='managersonly.php'>Admini paneel!</a></br>";
	 }
	 ?>

</td>