<?php
include_once 'temp.php';
?>
<title>Craigslist</title>
<?php

?>
<head>
<style>
body{
	background: white;
	background-image: url(mini.jpg);
	background-repeat: no-repeat;
	background-size: 1350px 250px;
}
 
.solid {
    background: dimgray;
 }

</style>
</head>
<p style="text-align:center;font-size: 40px; color:red"><bold>New Arrivals!!</bold></p>

<br><br><br><br>
<div style="padding-left:35%;">
<form class="navbar-form navbar-left" role="search" method="POST" action="ads.php" >

  <div class="form-group">

    <input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
  </div>
  <button type="submit" class="btn btn-default" onclick="return check()">Search</button>
</form>
<br>
<h5 ><a href="adpost.php"><strong>Post an Advertisement</strong></a></h5>
</div>

<br>
<!-- <form role="form" name="form" method="POST" action="ads.php">
  
  <div class="form-group">
       <input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
  </div>
  </form> -->
<h3 style="padding-left:40px; color:green"><strong>Categories</strong></h3>
<div style="padding-right:1100px; padding-left:10px">
<div class="solid" style="padding-left:30px">
<?php
 $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
        echo "<a href='ads.php?cat=".$fet['ID']."'>".$fet['Category']."</a></br>";
    }
?>

</div>
</div>

<script>
function check()
{
return true;
}

</script>
