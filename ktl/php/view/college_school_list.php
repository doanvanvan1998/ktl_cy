<?php
session_start();
include "../mysql.php";

$query="select name from recruit_able_college";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
  echo $row[0]."::::";
}

?>
