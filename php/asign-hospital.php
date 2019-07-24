<?php
error_reporting(E_ALL);
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

	include './connection.php';

	$datesql = "select uid from Attandance where date='$date'";

	$date_result= mysqli_query($con,$datesql) or die('Error while fetching data...');
	
	$a = mysqli_num_rows($date_result);

	if(0===$a)
	{

		$sql = "select * from students where status='1' ORDER BY hospital";

		

		$result = mysqli_query($con,$sql) or die('Error while fetching data...');

		

		echo "<form action='genrate-attandance-list.php' method='POST'>";

		echo "<table border='2' class='table table-responsive-md table-striped'>
			<tr>
				<th colspan='6'><a href='superUser.php' class='btn btn-info'>back</a><center>Genrate Attandance List for Date: $date</center></th>
			</tr>
			<tr>
				<th>SNO</th>
				<th>UID</th>
				<th>NAME</th>
				<th>SECTION</th>
				<th>Roll no.</th>
				<th>HOSPITAL</th>
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
				<td>".$row['hospital']."


					<input type='hidden' name='uid[]' value='$row[uid]'>
					<input type='hidden' name='name[]' value='$row[name]'>
					<input type='hidden' name='section[]' value='$row[section]'>
					<input type='hidden' name='hname[]' value='$row[hospital]'>
					<input type='hidden' name='roll[]' value='$row[roll]'>
					<input type='hidden' name = 'date' value='$date'>
				</td>
			</tr>";
			$i++;
		}
		echo"
			</table>
			<div class=''>
				<button type='submit' name='save-btn' class='rishu-btn'>Genrate Attandance List</button>
			</div>
		";
		echo "</form>";
	}
	else
	{
		echo "<center>Sorry hospitals are already alloted to student on this date ".$date."</center>";
		echo "<br><a href='superUser.php' class='rishu-btn'>Go Back</a>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark--Genrate Attandance list</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>
	 
</body>
</html>
