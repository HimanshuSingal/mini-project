<?php
include_once 'temp1.php';
if(isset($_GET['user']))
{
$user=$_GET['user'];
$query=mysql_query("SELECT * FROM User where Login_ID='$user'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($query);
echo "Name -".$fet['Name']."</br>";
echo "Email id -".$fet['Email_ID']."</br>";
echo "Phone No -".$fet['Phone_no']."</br>";
echo "Address - ".$fet['Address']."</br>";
echo "</br>";

}


?>

