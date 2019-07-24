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
	$k=0;
	include './connection.php';
	$sql1 = "select * from hospital";
	$r1 = mysqli_query($con,$sql1) or die ("Error while Inserting data...".mysqli_error($con));
	while($row = mysqli_fetch_array($r1))
	{
		if($row[name]==$hname)
		{
			$k=1;
		}
	}	

	if($k==0)
	{
		$sql ="insert into hospital values('$hname');";

		$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));

		if(empty($result))
		{
			echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-danger'>
						<h4>error</h4>
						<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
					</div>
			</div>";
		}
		else
		{
			echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
						<h4>New Hospital Added successfully!</h4><br>
							<a href='./superUser.php' style='left:40%;text-decoration:none;' class='rishu-btn bg-info'>OK</a>
					</div>
			</div>";
		}
	}
	else
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-danger'>
						<h4>$hname Hospital Already Exists</h4><br>
							<a href='./superUser.php' style='left:40%;text-decoration:none;' class='rishu-btn-error bg-danger'>OK</a>
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