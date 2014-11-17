<head>
		<style>
			body
				{
					padding-top: 100px;
					padding-left:400px; 
				}
			.column
				{
					
					border: 5px solid #a1a1a1;
				    padding: 10px 10px; 
			    	background: #F5F5F5;
			    	width: 500px;
			    	border-radius: 10px;
				}
		</style>
</head>

<body>

	<div class="column" style="text-align:center">
		<?php
		include_once 'temp.php';
		if(isset($_GET['user']))
		{
		$user=$_GET['user'];
		$query=mysql_query("SELECT * FROM User where Login_ID='$user'",$cn) or die(mysql_error());
		$fet = mysql_fetch_array($query);
		echo "Name -".$fet['Name']."</br>";
		echo "Email id -".$fet['Email_ID']."</br>";
		echo "Phone No -".$fet['Phone_no']."</br>";
		echo "Address - ".$fet['Address']."</br>";
		echo "</br>";

		}
		?>
	</div>
</body>
