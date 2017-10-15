<?php
//Connect to MySQL
include("connect.php");
$result = $mysqli->query("select * from chat order by time desc limit 0,10");
$messages = array();
//Loop and get in an array all the rows until there are not more to get
while($row = $result->fetch_array()){
   //Put the messages in divs and then in an array
   $messages[] = "<div class='message'><div class='messagehead'>" . $row['name'] . " - " . $row['time'] . "</div><div class='messagecontent'>" . $row['message'] . "</div></div>";
   //The last posts date
   $old = $row['time'];
}
//Display the messages in an ascending order, so the newest message will be at the bottom
for($i=count($messages)-1;$i>=0;$i--){
   echo $messages[$i];
}
//This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
$mysqli->query("delete from chat where time < " . $old);
?>