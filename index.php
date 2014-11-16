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
 
.row {
    background-color: lightgray;
   
 }
 .active{
 	font-size: 35px;
 }

</style>
</head>

<body>
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

<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active">Category<span class="sr-only">(current)</span></li><br>
            <li style="font-size:20px"> <?php
            $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
            while($fet = mysql_fetch_array($query))
            {
                  echo "<a href='ads.php?cat=".$fet['ID']."'>".$fet['Category']."</a>";
            }
           ?></li>
          </ul>
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
