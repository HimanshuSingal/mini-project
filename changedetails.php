<?php

include_once 'temp.php';

?>


<title>change details</title>
<?php
/*if(isset($_SESSION['loginid']) && isset($_SESSION['pass']))
{
$loginid=$_SESSION['uname'];
$pass=$_SESSION['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass' and blocked='N'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
?>*/

?>
<?php 

if(isset($_POST['name']))
{

$name=$_POST['name'];
//$loginid=$_POST['loginid'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$pass=$_POST['pass'];
}
if("$name"!="")
$result=mysql_query("UPDATE user SET Name="$name" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());
//if($loginid!="")
//$result=mysql_query("UPDATE user SET Login_Id="$loginid" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());
if("$email"!="")
$result=mysql_query("UPDATE user SET Email_Id="$email" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());
if("$phone"!="")
$result=mysql_query("UPDATE user SET Phone_no="phone" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());
if("$address"!="")
$result=mysql_query("UPDATE user SET Address="$address" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());
if("$pass"!="")
$result=mysql_query("UPDATE user SET Password="$pass" WHERE  Login_Id="$loginid"",$cn) or die(mysql_error());

?>

<head>
<style>
body
{
background-position: 0px 55px;
background-color: #89AAEE;
}
</style>
</head>
<body>
<div class="container">
<div class="row" style="margin-top:100px;">
<div class="col-md-4 col-md-offset-4">
<form method="POST" name="myform" action="changedetails.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
<fieldset>
<h3 class="sign-up-title" style="color:dimgray;">Change details</h3>
<p id="demo" style="color:red"></p>
<hr class="colorgraph">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
<input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter a user name">
<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
<input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
<input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password">
<br>
<input class="btn btn-lg btn-success btn-block" type="submit" value="change" onclick="return check()">
</fieldset>
</form>
</div>
</div>
</div>
</div>
</body>
<script>
function check()
{
return true;
}
</script>
