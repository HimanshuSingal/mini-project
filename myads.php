<?php
ob_start();
session_start();
include_once 'temp.php';
if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
{
$loginid=$_SESSION['uname'];
$pass=$_SESSION['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']!=1)
{
 header("Location:login.php");
}
}
else
header("Location:login.php");

if(isset($_POST['delete'])){
if(!empty($_POST['delete'])){
foreach($_POST['delete'] as $id){
$result=mysql_query("update Ads_info set Display='N' where Ads_ID='$id'",$cn) or die(mysql_error());
}
}}


?>
<form name="form" method="POST" action="myads.php">
<?php
$query=mysql_query("SELECT * FROM Ads_info as a,Post_ads as p,Category1 as c where  p.Login_ID='$loginid' and p.Ads_ID=a.Ads_ID and c.ID=a.Category and a.Display='Y' and a.Blocked='N' order by a.Time desc",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
$id=$fet['Ads_ID'];
$src="adphotos/".$id.".jpg";
if(file_exists($src))
{
echo "<img src='$src' width='300' height='200'></br>";
}
        echo "Title -".$fet['Title']."</br>";
echo "Category -".$fet['Category']."</br>";

echo "Details -".$fet['Description']."</br>";
echo "Price -".$fet['Price']."</br>";
if($fet['New']=="Y")
echo "Brand New </br>";
if($fet['New']=="N")
echo "Used</br>";
echo "Location -".$fet['Address']."</br>";
echo "<input type='checkbox' name='delete[]' value='$id'>Delete</br></br>";
}
?>
<input type='submit' value="Delete" onclick="return check()"/>
<script>
function check()
{
return true;
}
</script>
