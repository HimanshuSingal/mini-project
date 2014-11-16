<?php
ob_start();
session_start();
include_once 'temp.php';
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
<title>Block Ads</title>
<form role="form" name="form" method="POST" action="blockads1.php">
  
  <div class="form-group">
       <input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
  </div>
  </form>
<h4>Categories</h4>
<?php
 $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
        echo "<a href='blockads1.php?cat=".$fet['ID']."'>".$fet['Category']."</a></br>";}
?>



<script>
function check()
{
return true;
}
</script>
