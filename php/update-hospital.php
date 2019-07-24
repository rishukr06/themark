<?php
error_reporting(0);
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


		$sql = "select * from students where status='1' and section='$sname' and roll>='$sroll' and roll<='$eroll' ORDER BY roll;";

		

		$result = mysqli_query($con,$sql) or die('Error while fetching data...');

		

		echo "<form action='update-students-list.php' method='POST'>";

		echo "<table border='2' class='table table-responsive-md table-striped'>
			<tr>
				<th colspan='8'><a href='superUser.php' class='btn btn-info'>back</a><center>STUDENT'S DATA</center></th>
			</tr>
			<tr>
				<th>SNO</th>
				<th>UID</th>
				<th>NAME</th>
				<th>SECTION</th>
				<th>ROll No.</th>
				<th>GROUP</th>
				<th>Crr_hospital</th>
				<th>change to</th>
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
				<td>".$row['s_group']."</td>
				<td>".$row['hospital']."</td>
				<td>

					
				<input type='text' name='newhname[]' value='$hname' readonly style='border:none;background:transparent;'>
					<input type='hidden' name='uid[]' value='$row[uid]'>
					<input type='hidden' name='name[]' value='$row[name]'>
					<input type='hidden' name='section[]' value='$row[section]'>
					<input type='hidden' name = 'date' value='$date'>
				</td>
			</tr>";
			$i++;
		}
		echo"
			</table>
			<div class=''>
				<button type='submit' name='save-btn' class='rishu-btn'>Update Hospital List</button>
			</div>
		";
		echo "</form>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark--Asign Hospital</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>
	
</body>
</html>
