<?php
ob_start();
session_start();
include_once 'temp.php';
?>
<title>Post Ad</title>
<?php
if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
{
$loginid=$_SESSION['uname'];
$pass=$_SESSION['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass'",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
if($fet['cnt']!=1)
{
 header("Location:login.php");
}
}
else
{
header("Location:login.php");
}

if(isset($_POST['title']))
{

$title=$_POST['title'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$address=$_POST['address'];
$cat=$_POST['cat'];
$new=$_POST['new'];
$result=mysql_query("select Ads_ID from Ads_info order by Ads_ID desc limit 1",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
$adid=$fet['Ads_ID']+1;
$target="adphotos/";
if ((($_FILES["photo"]["type"] == "image/jpeg")
            || ($_FILES["photo"]["type"] == "image/pjpg"))
            && ($_FILES["photo"]["size"] < 100000000000))
            {
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target.$adid.".jpg");
		$result=mysql_query("INSERT INTO Ads_info(Ads_ID,Title,Price,Description,Address,Category,Display,New) values('$adid','$title','$price','$desc','$address','$cat','Y','$new')",$cn) or die(mysql_error());
		$result=mysql_query("INSERT INTO Post_ads(Login_ID,Ads_ID) values('$loginid','$adid')",$cn) or die(mysql_error());

            }
            else
            {
                echo "choose right format for photo";
            }


}


?>
	
  <form role="form" name="form" method="POST" enctype="multipart/form-data" action="adpost.php">
  
<div class="form-group">
    <label for="cat">Category</label>
  
  <select  class="form-control" id="cat" name='cat'>
<option value="NULL">Choose Category</option>
 <?php  
	 $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
             while($fet = mysql_fetch_array($query))
               {
                   echo "<option value = '".$fet['ID']."'>".$fet['Category']."</option>";
               }
 ?>
</select>  
</div>
 
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title for searching product">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
  </div>

  <div class="form-group">
       <label for="new">New</label><input type="radio" class="form-control" id="new" name="new" value="Y">
       <label for="new">Old</label><input type="radio" class="form-control" id="new" name="new" value="N">
 
 </div>
  

  <div class="form-group">
    <label for="address">Location</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter location of product">
  </div>
  
 <div class="form-group">
    <label for="desc">Details</label>
    <textarea class="form-control" id="desc" name="desc">
   </textarea>
  </div>
  
 <div class="form-group">
    <label for="photo">Upload a picture(jpeg or jpg)</label>
    <input type="file" name="photo" id="photo"/>
  </div>

<button type="submit" class="btn btn-default" onclick="return check()">Submit</button>
</form>


<script>
function check()
{
return true;
}
</script>
