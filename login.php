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
          background-position: 0px 55px;
          background-color: #89AAEE;
         }
         
        </style>
</head>
<body>
       <div class="container">
  <div class="row" style="margin-top:100px;">
    <div class="col-md-4 col-md-offset-4">
      <form method="POST" name="myform" action="login.php" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">
      <input name="_token" type="hidden" value="snIDVlxZSk7KEJjGcPcP9EmwfyY1lMyIuaU5s8ct">
        <fieldset>
            <h3 class="sign-up-title" style="color:dimgray;">Welcome back! sign in</h3>
            <p id="demo"></p>
            <hr class="colorgraph">
            <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Username">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password"><br>
            
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" onclick="return check()">
          </fieldset>
        </form>
    </div>
    </div>
</div>
    </div>

 
 <script>


function check()
{
if(document.myform.loginid.value == "")
   {
     //document.getElementById("demo").innerHTML = "Please enter the item to be searched!!";
     //return false;
     alert( "Please enter the loginid to be searched!!" );
     document.myform.loginid.focus() ;
     return false;
     
   }
  
return true;

}
</script>
