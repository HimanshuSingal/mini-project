<?php
include_once 'tempadmin.php';
include_once 'temp2admin.php';
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

if(isset($_POST['Block'])){
if(!empty($_POST['Block'])){
foreach($_POST['Block'] as $val){
$arr=explode("--",$val);
$id=$arr[0];
$block=$arr[1];
$result=mysql_query("update Ads_info set Blocked='$block' where Ads_ID='$id'",$cn) or die(mysql_error());
$result=mysql_query("insert into Admin_Ads(Login_ID,Ads_ID,Act) values('$loginid','$id','$block') ",$cn) or die(mysql_error());
}}}
?>

<head>
  <title>Mini Craigslist</title>
</head>

<body>
<div class="container">


<div class="row">
            <div class="col-lg-12 text-center"><h3>Showing All Results</h3></br></div>
</div>
        <div class="row">
            <div class="col-lg-12 text-center">
<?php
              
     $query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Display='Y' order by Time desc",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
$id=$fet['Ads_ID'];
$src="adphotos/".$id.".jpg";
if(file_exists($src))
{
echo "<img src='$src' width='200' height='200'></br>";
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
echo "<a href='profile.php?user=".$user."'>Contact Me</a></br>";

echo "</br>";
}
?>
            </div>

       
    </div>
</div>


<script>
function check()
{
return true;
}
</script>
