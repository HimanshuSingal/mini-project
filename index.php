<?php
include_once 'temp.php';
?>
<title>Craigslist</title>
<?php
if(isset($_POST['search']))
{
$loginid=$_POST['loginid'];
$pass=$_POST['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']==1)
{
echo "success";
$_SESSION['uname']=$loginid;
$_SESSION['pass']=$pass;
}
else
echo "failed";
}

?>




<a href="adpost.php">Post an Advertisement</a>

<form role="form" name="form" method="POST" action="index.php">
  
  
  <div class="form-group">
       <input type="text" class="form-control" id="search" name="search" placeholder="Search">
  </div>
  
  
<button type="submit" class="btn btn-default" onclick="return check()">Go</button>
</form>


<script>
function check()
{
return true;
}
</script>
