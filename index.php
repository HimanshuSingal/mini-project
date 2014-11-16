<?php
include_once 'temp.php';
?>
<title>Craigslist</title>
<?php

?>




<a href="adpost.php">Post an Advertisement</a>

<form role="form" name="form" method="POST" action="ads.php">
  
  <div class="form-group">
       <input type="text" class="form-control" id="search" name="search" placeholder="Enter Item To Search">
<button type="submit" class="btn btn-default" onclick="return check()">Search</button>
  </div>
  </form>
<h4>Categories</h4>
<?php
 $query=mysql_query("SELECT * FROM Category1 order by Category",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
        echo "<a href='ads.php?cat=".$fet['ID']."'>".$fet['Category']."</a></br>";}
?>



<script>
function check()
{
return true;
}
</script>
