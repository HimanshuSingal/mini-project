<?php
include_once 'temp1.php';
if(isset($_POST['search']))
{
$search=$_POST['search'];
$query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Title like '%$search%' order by a.Time",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
        echo "Title -".$fet['Title']."</br>";
echo "Category -".$fet['Category']."</br>";

echo "Details -".$fet['Description']."</br>";
echo "Price -".$fet['Price']."</br>";
if($fet['New']=="Y")
echo "Brand New </br>";
if($fet['New']=="N")
echo "Used</br>";
echo "Location -".$fet['Address']."</br>";
echo "</br>";
}
}
?>

