<?php
ob_start();
session_start();
include_once 'temp.php';
?>
<title>Register Admin</title>
<?php
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
if(isset($_POST['name']))
{
$name=$_POST['name'];
$loginid=$_POST['loginid'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$pass=$_POST['pass1'];
$result=mysql_query("INSERT INTO Admin(Name,Login_ID,Email_ID,Phone,Address,Password) values('$name','$loginid','$email','$phone','$address','$pass')",$cn) or die(mysql_error());
}

?>
	
  <form role="form" name="form" method="POST" action="adminregister.php">
  
  <div class="form-group">
    <label for="name">Name *</label>
    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name">
  </div>

  <div class="form-group">
    <label for="loginid">User Name *</label>
    <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter your desired admin id">
  </div>
  <div class="form-group">
    <label for="email">Email Id *</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="phone">Phone Number *</label>
    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
  </div>
  <div class="form-group">
    <label for="pass1">Choose Password *</label>
    <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="pass2">Retype Password *</label>
    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Retype Password">
  </div>
  
  
<button type="submit" class="btn btn-default" onclick="return check()">Register</button>
</form>

<script>
function check()
{
return true;
}
</script>
