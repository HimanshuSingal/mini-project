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



<script>
function check()
{
return true;
}
</script>
