<?php
include_once 'temp.php';
?>
<title>Post Ad</title>
<?php
if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
{
$loginid=$_SESSION['uname'];
$pass=$_SESSION['pass'];
$result=mysql_query("select count(*) as cnt from User where Login_ID='$loginid' and Password='$pass' and blocked='N'",$cn) or die(mysql_error());
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
if(isset($_POST['new']))
$new=$_POST['new'];
else
$new='O';
$result=mysql_query("select Ads_ID from Ads_info order by Ads_ID desc limit 1",$cn) or die(mysql_error());
$fet = mysql_fetch_array($result);
$adid=$fet['Ads_ID']+1;
$target="adphotos/";
if ((($_FILES["photo"]["type"] == "image/jpeg")
            || ($_FILES["photo"]["type"] == "image/pjpg"))
            && ($_FILES["photo"]["size"] < 2000000) && getimagesize($_FILES['photo']['tmp_name']))
            {
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target.$adid.".jpg");
		$result=mysql_query("INSERT INTO Ads_info(Ads_ID,Title,Price,Description,Address,Category,Display,New) values('$adid','$title','$price','$desc','$address','$cat','Y','$new')",$cn) or die(mysql_error());
		$result=mysql_query("INSERT INTO Post_ads(Login_ID,Ads_ID) values('$loginid','$adid')",$cn) or die(mysql_error());
 
            }
           else if(!file_exists($_FILES['photo']['tmp_name']) || !is_uploaded_file($_FILES['photo']['tmp_name']))
           {
		$result=mysql_query("INSERT INTO Ads_info(Ads_ID,Title,Price,Description,Address,Category,Display,New) values('$adid','$title','$price','$desc','$address','$cat','Y','$new')",$cn) or die(mysql_error());
		$result=mysql_query("INSERT INTO Post_ads(Login_ID,Ads_ID) values('$loginid','$adid')",$cn) or die(mysql_error());

           }
           else
            {
                echo "<script>alert('choose right format/size for photo')</script>";
            }

}



?>
<head>

    <style>
      body{
          padding-top: 60px;
        }
        .container{
          border: 2px solid #a1a1a1;
          padding: 10px 10px; 
          background: #F5F5F5;
          width: 800px;
          border-radius: 25px;

        }
    </style>

</head>

<body>
  	<div class="container" >
        <div class="row" style="margin-top:10px;">
           <div class="col-md-4 col-md-offset-4">
           <p id="demo" style="color:red"></p>
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
 
                              <td>
                                <div class="form-group">
                                     <label for="new">New</label><input type="radio"  id="new" name="new" value="Y">&nbsp&nbsp&nbsp
                                     <label for="new">Old</label><input type="radio"  id="new" name="new" value="N">
                               
                                </div>
                              </td>
                              <div class="form-group">
                                  <label for="address">Location</label>
                                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter location of product">
                              </div>
            
                              <div class="form-group">
                                  <label for="desc">Details</label>
                                  <textarea class="form-control" id="desc" name="desc"></textarea>
                              </div>
  
                              <div class="form-group">
                                  <label for="photo">Upload a picture(jpeg or jpg)</label>
                                  <input type="file" name="photo" id="photo"/>
                              </div>

                                  <button type="submit" class="btn btn-default" onclick="return check()">Submit</button>
                </form>

          </div>
       </div>
    </div>
</body>

<script>
function check()
{


	if(document.form.cat.value=="NULL")
	{
	document.getElementById("demo").innerHTML = "Please choose category!!";
	return false;
	}

	if(document.form.title.value=="")
	{
		document.getElementById("demo").innerHTML = "Please enter title!!";
		return false;
	}

		return true;




}
</script>
