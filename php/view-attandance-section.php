

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

if(isset($_POST['v-a-section-btn']))
{
	extract($_POST);

	include './connection.php';

	$markedsql = "select mark from Attandance where date='$date' and section='$sname' and time='$time';";

	$check= mysqli_query($con,$markedsql) or die('Error while fetching data...'.mysqli_error($con));

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
		echo" class='rishu-btn'>Go Back</a>";
	}
	else
	{

		while($row = mysqli_fetch_array($check))
		{
		$mark_val[] = $row['mark'];
		//echo $mark_val;
		}

		for($i=0;$i<count($mark_val);$i++)
		{
			$mark_val_check = $mark_val[$i];
			if($mark_val_check==1)
			{
				break;
			}
		}

		if(1 == $mark_val_check)
		{

		$sql = "select * from Attandance where date='$date' and section='$sname'and time='$time' order by roll;";

		$result = mysqli_query($con,$sql) or die('Error while fetching data...'.mysqli_error($con));

		echo "<div id='dvData'>";

		echo "<table border='2' class='table table-responsive-md table-striped' name='section>$sname>date>$date>time>$time'>
			<tr>
				<th colspan='5'><a ";

				if($_SESSION['user_type']==='super_user')
			{
				echo "href='superUser.php'"; 
			}
			else if($_SESSION['user_type']==='client')
			{
				echo "href='./teacher.php'"; 
			}

				echo "class='btn btn-info'>back</a><a href='#' class='export btn btn-info'>Export</a><center>STUDENT'S ATTANDANCE ON <font color='red'>$date</font> AT <font color='red'>$time</font></center></th>
			</tr>
			<tr>
				<td><b>SerialNo</b></td>
				<td><b>RegistrationNumber</b></td>
				<td><b>Name</b></td>
				<td><b>RollNumber</b></td>
				<td><b>Status</b></td>
			</tr>";
				$i=1;
		while($row = mysqli_fetch_array($result))
		{
			if($row['mark']==0)
			{
				$att = 'not marked';
			}
			else
			{
				$att = $row['attandance'];
			}
			echo 
			"<tr>
				<td>".$i."</td>
				<td>".$row['uid']."</td>
				<td>".$row['name']."</td>
				<td>".$row['roll']."</td>
				<td>".$att."</td>
			</tr>";
			$i++;
		}
		echo"</table></div>";
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

			echo " class='rishu-btn'>Go Back</a>";
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
	<script src="./csv.js"></script>
</head>
<body>

</body>
</html>
