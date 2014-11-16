<?php
ob_start();
session_start();
include_once 'temp.php';
?>
<title>Sign In</title>
<?php
if(isset($_POST['loginid']))
{
$loginid=$_POST['loginid'];
$pass=$_POST['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']==1)
{
header("Location:index.php");
$_SESSION['uname']=$loginid;
$_SESSION['pass']=$pass;
}
else
echo "failed";
}

?>
<head>
<style>
        body
        {
          background-image: url("help.jpg");
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: 0px 55px;
         }
         
        </style>
</head>
<body>
       <div class="container">
  <div class="row" style="margin-top:50px; padding-right:300px">
    <div class="col-md-4 col-md-offset-4">
      <form method="POST" action="login.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
        <fieldset>
            <h3 class="sign-up-title" style="color:dimgray;">Welcome back! sign in</h3>

            <hr class="colorgraph">
            <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Username">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            <div class="checkbox">
              <label><input name="remember" type="checkbox" value="Remember Me"> Remember Me</label>
            </div>
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
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
