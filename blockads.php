<?php
include_once 'tempadmin.php';
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
<head>
<title>Block Ads</title>
<style>
 
 .active{
 	font-size: 35px;
 }
 .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0px;
    left: 0px;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #F5F5F5;
    border-right: 1px solid #EEE;
}

</style>
</head>

<body>
<br><br>
<div style="padding-left:40% ;background-color:#ecf0f1;padding-top:13px;padding-bottom:5px;">
	<form class="navbar-form navbar-left" role="search" method="POST" action="ads.php">
		<div class="form-group">
    		<input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
    	</div>

    		<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
    		
	</form>

</div>

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active">Category<span class="sr-only">(current)</span></li><br>
            <li style="font-size:20px"> <?php
            $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
            while($fet = mysql_fetch_array($query))
            {
                  echo "<a href='blockads1.php?cat=".$fet['ID']."'>".$fet['Category']."</a>";
            }
           ?></li>
          </ul>
        </div>
      </div>
</div>

<script>
function check()
{
return true;
}
</script>
