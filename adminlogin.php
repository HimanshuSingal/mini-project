<?php
ob_start();
session_start();
include_once 'temp.php';
?>
<title>Admin Log In</title>
<?php
if(isset($_POST['loginid']))
{
$loginid=$_POST['loginid'];
$pass=$_POST['pass'];
$result=mysql_query("select count(*) as cnt from Admin where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']==1)
{
echo "success";
$_SESSION['admin']=$loginid;
$_SESSION['adminpass']=$pass;
}
else
echo "failed";
}

?>
	
  <form role="form" name="form" method="POST" action="adminlogin.php">
  
  
  <div class="form-group">
    <label for="loginid">Admin Name</label>
    <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter your admin login id">
  </div>
  <div class="form-group">
    <label for="pass1">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your Password">
  </div>
  
  
<button type="submit" class="btn btn-default" onclick="return check()">Sign In</button>
</form>


<script>
function check()
{
return true;
}
</script>
