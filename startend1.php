<?php
ob_start();
session_start();
if(isset($_POST['start']) && isset($_POST['end']))
{
if($_POST['start']>0 && $_POST['end']>=$_POST['start']){
echo $_SESSION['start']=$_POST['start']-1;
	echo $_SESSION['end']=$_POST['end']-$_POST['start']+1;
}
header("Location:blockads.php");
}
?>
