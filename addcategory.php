<?php
include_once 'tempadmin.php';
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
                <form role="form" name="form" method="POST" enctype="multipart/form-data" action="addcategory.php">
    
                    <div class="form-group">
                                  <label for="cat">Category</label>
                                  <input type="text" class="form-control" id="cat" name="cat" placeholder="Enter Category To Add">
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
return true;
}
</script>
