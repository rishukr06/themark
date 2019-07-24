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
if($_SESSION['user_type']!='super_user')
{
	header('location:../');
}
if(isset($_POST['btn']))
{
	 extract($_POST);
	 
	 $count = count($_POST['uid']);

	 include './connection.php';

	 $sql = "update students set status='$status' where uid='$uid'";
	 $result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));
	 if(!empty($result))
	{
	 	echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
						<h4>Status changed successfully!</h4><br>
							<a href='./superUser.php' style='left:40%;text-decoration:none;' class='rishu-btn bg-info'>OK</a>
					</div>
			</div>";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body></body></html>