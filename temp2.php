<head>
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
<div  style="padding-left:40% ;background-color:#F5F5F5;padding-top:13px;padding-bottom:5px;">
	<form class="navbar-form navbar-left" role="search" method="POST" action="ads.php">
		<div class="form-group">
    		<input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
    	</div>

    		<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
	</form>
<br>
<br>
	<h5 style="padding-left:20px"><a href="adpost.php"><strong>Post an Advertisement</strong></a></h5>
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
                  echo "<a href='ads.php?cat=".$fet['ID']."'>".$fet['Category']."</a>";
            }
           ?></li>
          </ul>
        </div>
      </div>
</div>

<div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
<?php
              
     $query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Display='Y' and a.Blocked='N' order by Time desc",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
$id=$fet['Ads_ID'];
$src="adphotos/".$id.".jpg";
if(file_exists($src))
{
echo "<img src='$src' width='200' height='200'></br>";
}
        echo "Title -".$fet['Title']."</br>";
echo "Category -".$fet['Category']."</br>";

echo "Details -".$fet['Description']."</br>";
echo "Price - ".$fet['Price']."</br>";
if($fet['New']=="Y")
echo "Brand New </br>";
if($fet['New']=="N")
echo "Used</br>";
echo "Location -".$fet['Address']."</br>";
$userquery=mysql_query("SELECT * FROM Post_ads where Ads_ID='$id'",$cn) or die(mysql_error());
$userfet=mysql_fetch_array($userquery);
$user=$userfet['Login_ID'];
echo "<a href='profile.php?user=".$user."'>Contact Me</a></br>";

echo "</br>";
}
?>
            </div>
       
    </div>
</body>