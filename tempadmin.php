<?php
ob_start();
session_start();
include_once 'cn.php';
?>
<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .navbar-inverse navbar-fixed-top{
        background-color:blue;
    }
    </style>
  </head>


<body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" ><img src="21.jpg" style="width:40px;height:35px"></a>
          <a class="navbar-brand" style="font-size:30px">Topaz World</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li><a href='blockads.php'>Home</a>
          <li><?php
               if(isset($_SESSION['admin']) && isset($_SESSION['adminpass']))
                {
                    $loginid=$_SESSION['admin'];
                    $pass=$_SESSION['adminpass'];
                    $result=mysql_query("select count(*) as cnt from Admin where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
                    $fet = mysql_fetch_array($result);
             if($fet['cnt']!=1)
             {
                echo "<li><a href='adminlogin.php'> sign in</a><li>";
                echo "<li><a href='adminregister.php'> sign up</a><li>";

            } 
            else
            {  
              echo "<li><a href='addcategory.php'>Add Category</a></li>";
              echo "<li><a href='blockuser.php'>Block User</a></li>";
              echo "<li><a href='adminregister.php'>Register another admin here</a></li>";
               echo "<li><a href='adminlogout.php'>Logout</a></li>"; 
                echo "<li style='color:red'>Hey! $loginid<li>"; 
               
             }
           
        }
         else
         {
               echo "<a href='adminlogin.php'> sign in</a>";
               echo "<li><a href='adminregister.php'> sign up</a><li>";
          }
          ?></li>
         
          

            <!-- <li><a href="login.php">Sign in</a></li>
            <li><a href="register.php">Sign up</a></li> -->
          </ul>
        </div>
      </div>
    </nav>

<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
