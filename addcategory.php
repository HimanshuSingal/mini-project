<?php
ob_start();
session_start();
include_once 'temp.php';
?>
<title>Add Category</title>
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
if(isset($_POST['cat']))
{
$cat=$_POST['cat'];
$result=mysql_query("INSERT INTO Category1(Category) values('$cat')",$cn) or die(mysql_error());
}

?>
	
  <form role="form" name="form" method="POST" action="addcategory.php">
  
  <div class="form-group">
    <label for="cat">Category</label>
    <input type="text" class="form-control" id="cat" name='cat' placeholder="Enter Category">
  </div>
<button type="submit" class="btn btn-default" onclick="return check()">Add</button>
</form>

<script>
function check()
{
return true;
}
</script>
