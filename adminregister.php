<?php
ob_start();
session_start();
include_once 'tempadmin.php';
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
<head>
<style>
        body
        {
           background-position: 0px 55px;
          background-color: #89AAEE;
         }
         
        </style>
</head>
	
</head>
  <div class="container">
  <div class="row" style="margin-top:100px;">
    <div class="col-md-4 col-md-offset-4">
      <form method="POST" action="adminregister.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
        <fieldset>
            <h3 class="sign-up-title" style="color:dimgray;">Please sign up</h3>

            <hr class="colorgraph">
             <input type="text" class="form-control" id="name" name='name' placeholder="Enter name">
            <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter a user name">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
             <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Enter Password">
             <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Retype Password"><br>
            
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Resister">
          </fieldset>
        </form>
    </div>
    </div>
</div>
    </div>

  
<script>
function check()
{
return true;
}
</script>
