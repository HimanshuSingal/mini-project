<?php
ob_start();
session_start();
include_once 'tempadmin.php';
if(isset($_SESSION['admin']) && isset($_SESSION['adminpass']))
{
$loginid=$_SESSION['admin'];
$pass=$_SESSION['adminpass'];
$result=mysql_query("select count(*) as cnt from Admin where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']!=1)
{
 header("Location:forbidden.php");
}
}
else
{
header("Location:forbidden.php");
}
?>
<form name="form" action="blockads.php" method="POST">
<input type="submit" value="Change"/>
</br>
<?php 
if(isset($_POST['search']))
{
$search=$_POST['search'];
$query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and (a.Title like '%$search%' or a.Description like '%$search%' or c.Category like '%$search%') and a.Display='Y' order by a.Time desc",$cn) or die(mysql_error());
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
$userquery=mysql_query("SELECT * FROM Post_ads where Ads_ID='$id'",$cn) or die(mysql_error());
$userfet=mysql_fetch_array($userquery);
$user=$userfet['Login_ID'];

if($fet['Blocked']=="Y")
{echo "Blocked</br>";$block="N";}
if($fet['Blocked']=="N")
{echo "Normal</br>";$block="Y";}
echo "<a href='profile.php?user=".$user."'>User</a></br>";
$val=$id."--".$block;
echo "<input type='checkbox' name='Block[]' value='$val'/>Change</br></br>";

echo "</br>";
}
}

if(isset($_GET['cat']))
{
$cat=$_GET['cat'];
$query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Category='$cat' and a.Display='Y' order by Time desc",$cn) or die(mysql_error());
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
echo "Price - ".$fet['Price']."</br>";
if($fet['New']=="Y")
echo "Brand New </br>";
if($fet['New']=="N")
echo "Used</br>";
echo "Location -".$fet['Address']."</br>";
$userquery=mysql_query("SELECT * FROM Post_ads where Ads_ID='$id'",$cn) or die(mysql_error());
$userfet=mysql_fetch_array($userquery);
$user=$userfet['Login_ID'];

if($fet['Blocked']=="Y")
{echo "<span style='color:red'>This Ad is Blocked</span></br>";$block="N";}
if($fet['Blocked']=="N")
{echo "This is Ad is not Blocked</br>";$block="Y";}
echo "<a href='profile.php?user=".$user."'>User</a></br>";
$val=$id."--".$block;
echo "<input type='checkbox' name='Block[]' value='$val'>Change</br></br>";
echo "</br>";
}
}


?>

</form>
