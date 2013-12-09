<?php
//Connect to MySQL
include("connect.php");
$result = mysql_query("select * from chat order by time desc limit 0,20");
$messages = array();
//Loop and get in an array all the rows until there are not more to get
while($row = mysql_fetch_array($result)){
   //Put the messages in divs and then in an array
   $messages[] = "<div class='message'><div class='messagehead'>" . $row[name] . " - " . date('g:i A M, d Y',$row[time]) . "</div><div class='messagecontent'>" . $row[message] . "</div></div>";
   //The last posts date
   $old = $row[time];
}
//Display the messages in an ascending order, so the newest message will be at the bottom
for($i=9;$i>=0;$i--){
   echo $messages[$i];
}
//This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
mysql_query("delete from chat where time < " . $old);
?>