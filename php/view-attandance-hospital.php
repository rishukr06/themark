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
if(isset($_POST['v-a-hosp-btn']))
{
	extract($_POST);

	include './connection.php';

	$markedsql = "select mark from Attandance where date='$date' and hospital='$hname' and time='$time' LIMIT 1;";

	$check= mysqli_query($con,$markedsql) or die('Error while fetching data...');

	$a = mysqli_num_rows($check);

	if(0===$a)
	{
	 	echo "<center>Sorry attandance page is not genrated yet</center>";
		echo "<br><a ";

			if($_SESSION['user_type']==='super_user')
			{
				echo "href='superUser.php'"; 
			}
			else if($_SESSION['user_type']==='client')
			{
				echo "href='./teacher.php'"; 
			}

		echo " class='rishu-btn'>Go Back</a>";
	}
	else
	{

		while($row = mysqli_fetch_array($check))
		{
		$mark_val = $row['mark'];
		//echo $mark_val;
		}

		if(1 == $mark_val)
		{

		$sql = "select * from Attandance where date='$date' and hospital='$hname' and time='$time' order by roll;";

		$result = mysqli_query($con,$sql) or die('Error while fetching data...'.mysqli_error($con));

		echo "<table border='2' class='table table-responsive-md table-striped'>
			<tr>
				<th colspan='6'><a ";
				if($_SESSION['user_type']==='super_user')
			{
				echo "href='superUser.php'"; 
			}
			else if($_SESSION['user_type']==='client')
			{
				echo "href='./teacher.php'"; 
			}
				echo "class='btn btn-info'>back</a><center>STUDENT'S ATTANDANCE ON <font color='red'>$date</font> <font color='green'>$time</font> AT <font color='red'>$hname</font></center></th>
			</tr>
			<tr>
				<th>SNO</th>
				<th>UID</th>
				<th>NAME</th>
				<th>SECTION</th>
				<th>HOSPITAL</th>
				<th>ATTENDANCE</th>
			</tr>";
				$i=1;
		while($row = mysqli_fetch_array($result))
		{
			echo 
			"<tr>
				<td>".$i."</td>
				<td>".$row['uid']."</td>
				<td>".$row['name']."</td>
				<td>".$row['section']."</td>
				<td>".$row['hospital']."</td>
				<td>".$row['attandance']."</td>
			</tr>";
			$i++;
		}
		echo"</table>";
		}
		else
		{
			echo "<center>Sorry the attandance has been not marked yet for date: ".$date." and time: ".$time."</center>";
			echo "<br><a ";
				if($_SESSION['user_type']==='super_user')
			{
				echo "href='superUser.php'"; 
			}
			else if($_SESSION['user_type']==='client')
			{
				echo "href='./teacher.php'"; 
			}
			echo" class='rishu-btn'>Go Back</a>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark--view attandance via hospital</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>
	 
</body>
</html>
