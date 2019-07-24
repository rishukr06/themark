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
if(isset($_POST['save-btn']))
{
	 extract($_POST);
	 $date = $_POST['date'];
	 $count = count($_POST['uid']);

	 include './connection.php';
	 for($j=0;$j<4;$j++)
	{
		if($j==0)
		{
			$time ="9:00-10:00 Am";
		}
		else if($j==1)
		{
			$time ="10:00-11:00 Am";
		}
		else if($j==2)
		{
			$time ="11:00-12:00 Pm";
		}
		else
		{
			$time ="12:00-1:00 Pm";
		}
 	 for($i=0;$i < $count; $i++)
	 {

	 	$sql = "insert into Attandance values ('$uid[$i]', '$name[$i]', '$hname[$i]', '$date','absent','$section[$i]','0','not_marked','$time','$roll[$i]');";

	 	$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));
	 }
	}

	if(!empty($result))
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
						<h4>Student's Attandance List Genration Successful For Date: ".$date."</h4><br>
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