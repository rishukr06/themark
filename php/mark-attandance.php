<?php
session_start();
if(!isset($_SESSION['user']))
{
	if(!isset($_SESSION['user_type']))
	{
		header('location:../');
	}
}
$teacher = $_SESSION['user'];

if(isset($_POST['btn']))
{
	extract($_POST);
	if($date>date("Y-m-d"))
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-danger'>
						<h4>Date Error!</h4><br>
							<a href='./superUser.php' style='left:40%;text-decoration:none;' class='btn btn-danger'>OK</a>
					</div>
			</div>";
	}
	else
	{
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
			echo" class='rishu-btn'>Go Back</a>";
		}
		else
		{

			while($row = mysqli_fetch_array($check))
			{
			$mark_val = $row['mark'];
			//echo $mark_val;
			}

			if(0 == $mark_val)
			{

			$sql = "select * from Attandance where date='$date' and hospital='$hname' and time='$time' order by roll;";

			$result = mysqli_query($con,$sql) or die('Error while fetching data...'.mysqli_error($con));

			echo "<form action='save-attandance.php' method='POST'>";

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

					echo "
					class='btn btn-info'>back</a><center>STUDENT'S DATA for : $hname ON Date: $date and Time: $time</center></th>
				</tr>
				<tr>
					<th>SNO</th>
					<th>UID</th>
					<th>NAME</th>
					<th>SECTION</th>
					<th>Roll no.</th>
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
					<td>".$row['roll']."</td>
					<td>

						<select name=att[]>
							<option>absent</option>
							<option>present</option>
						</select>
						<input type='hidden' name='uid[]' value='$row[uid]'>
						<input type='hidden' name='time' value='$time'>
						<input type='hidden' name = 'date' value='$date'>
					</td>
				</tr>";
				$i++;
			}
			echo"
				</table>
				<input type='hidden' name='teacher' value='$teacher'>
				<div class=''>
					<button type='submit' name='save-att-btn' class='rishu-btn'>SAVE</button>
				</div>
			";
			echo "</form>";
			}
			else
			{
				echo "<center>Sorry the attandance has been already marked for date: ".$date." and time:".$time."</center>";

				echo "<br><a 

				";
				if($_SESSION['user_type']==='super_user')
				{
					echo "href='superUser.php'"; 
				}
				else if($_SESSION['user_type']==='client')
				{
					echo "href='./teacher.php'"; 
				}
				echo "
				class='rishu-btn'>Go Back</a>";
			}
		}
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
