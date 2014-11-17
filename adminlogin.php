<?php
ob_start();
session_start();
include_once 'tempadmin.php';
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
$_SESSION['admin']=$loginid;
$_SESSION['adminpass']=$pass;
header("Location:blockads.php");
}
else
echo "failed";
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
	<body>

 <div class="container">
  <div class="row" style="margin-top:100px;">
    <div class="col-md-4 col-md-offset-4">
      <form method="POST" action="adminlogin.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin"><input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
        <fieldset>
            <h3 class="sign-up-title" style="color:dimgray;">Admin! Sign in</h3>

            <hr class="colorgraph">
                <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter your admin login id">

            <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your Password"><br>
            
            <button type="submit" class="btn btn-lg btn-success btn-block" onclick="return check()">Sign In</button>
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
