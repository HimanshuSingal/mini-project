<?php
include_once 'tempadmin.php';
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
$result=mysql_query("update User set Blocked='$block' where Login_ID='$id'",$cn) or die(mysql_error());
$result=mysql_query("insert into Admin_User(Admin_ID,USER_ID,Act) values('$loginid','$id','$block') ",$cn) or die(mysql_error());
}}}
?>


<body>
<div class="container">


<div class="row">
            <div class="col-lg-12 text-center"><h3>Showing All Users</h3></br></div>
</div>
<div class="row">
		<form name="form" action="blockuser.php" method="POST">

            <div class="col-md-1"></div>
           <div class="col-md-1"></div>
            <div class="col-md-1"><input type="submit" value="Change"/></br>
</div>
          
</div>

        <div class="row">
            <div class="col-lg-12 text-center">
<?php
              
     $query=mysql_query("SELECT * FROM User  order by Login_ID",$cn) or die(mysql_error());
 while($fet = mysql_fetch_array($query))
 {
echo "User Name -".$fet['Login_ID']."</br>";
echo "Name -".$fet['Name']."</br>";
echo "Email -".$fet['Email_ID']."</br>";
echo "Phone -".$fet['Phone_no']."</br>";
echo "Address -".$fet['Address']."</br>";
if($fet['Blocked']=="Y")
{echo "<span style='color:red'>Blocked User</span></br>";
 $block='N';
}
if($fet['Blocked']=="N")
{
echo "Not Blocked</br>";
$block='Y';
}
$val=$fet['Login_ID']."--".$block;
echo "<input type='checkbox' name='Block[]' value='$val'/>Change</br></br>";

echo "</br>";

}
?>
            </div>

         </div>
</form>  
</div>


<script>
function check()
{
return true;
}
</script>
