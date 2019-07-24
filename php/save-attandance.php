<?php
session_start();
if(!isset($_SESSION['user']))
{

	header('location:../');
}
if(!isset($_SESSION['user_type']))
{
	
	header('location:../');
}
if(isset($_POST['save-att-btn']))
{
	 extract($_POST);
	 $date = $_POST['date'];
	 $count = count($_POST['uid']);

	 include './connection.php';

	 for($i=0;$i < $count; $i++)
	 {

	 	$sql = "update  Attandance set attandance='$att[$i]', mark ='1', mark_by='$teacher' where uid='$uid[$i]' and date='$date' and time='$time';";

	 	$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));
	 }

	if(!empty($result))
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
					<center>
						<h4>Attandance Marked Successfully For Date: $date and Time: $time</h4><br>
						<a class='btn btn-info'"; 
						if($_SESSION['user_type']==='super_user')
							{
								echo "href='superUser.php'"; 
							}
							else if($_SESSION['user_type']==='client')
							{
								echo "href='./teacher.php'"; 
							}
					echo ">OK</a>
						</center>
					</div>
			</div>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark--Mark attandance</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>
	
</body>
</html>