<?php
include_once 'tempadmin.php';
include_once 'temp2admin.php';
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


<body>
<div class="container">


<div class="row">
            <div class="col-lg-12 text-center"><h3>Showing All Results</h3></br></div>
</div>
<div class="row">
		<form name="form" action="blockads.php" method="POST">

            <div class="col-md-1"></div>
           <div class="col-md-1"></div>
            <div class="col-md-1"><input type="submit" value="Change"/></br>
</div>
          
</div>

         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
<?php
              
     $query=mysql_query("SELECT * FROM Ads_info as a,Category1 as c where a.Category=c.ID and a.Display='Y' order by Time desc",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
$id=$fet['Ads_ID'];
$src="adphotos/".$id.".jpg";
if(file_exists($src))
{
echo "<img src='$src' width='250' height='250'></br>";
}
        echo "Title -".$fet['Title']."</br>";
echo "Category -".$fet['Category']."</br>";

echo "Details -".$fet['Description']."</br>";
echo "Price -".$fet['Price']."</br>";
if($fet['New']=="Y")
echo "Brand New </br>";
if($fet['New']=="N")
echo "Used</br>";
echo "Location -".$fet['Address']."</br>";
$userquery=mysql_query("SELECT * FROM Post_ads where Ads_ID='$id'",$cn) or die(mysql_error());
$userfet=mysql_fetch_array($userquery);
$user=$userfet['Login_ID'];

if($fet['Blocked']=="Y")
{echo "<span style='color:red'>This ad is Blocked</span></br>";$block="N";}
if($fet['Blocked']=="N")
{echo "Normal Ad</br>";$block="Y";}
echo "<a href='profile.php?user=".$user."' target='_blank'>User</a></br>";
$val=$id."--".$block;
echo "<input type='checkbox' name='Block[]' value='$val'/>Change</br></br>";

echo "</br>";

}
?>
            </div>

       
    </div>
</div>


<script>
function check()
{
if(document.form.search.value == "")
   {
     document.getElementById("demo").innerHTML = "Please enter the item to be searched!!";
     return false;
     /*alert( "Please enter the item to be searched!!" );
     document.myform.search.focus();
     return false;*/
     
   }


return true;
}
</script>
