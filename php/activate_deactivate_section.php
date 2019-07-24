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

	
	

		$sql = "select * from section where section='$sname'";

		

		$result = mysqli_query($con,$sql) or die('Error while fetching data...');

		

		

		echo "<table border='2' class='table table-responsive-md table-striped'>
			<tr>
				<th colspan='7'><a href='superUser.php' class='btn btn-info'>back</a><center>STUDENT'S DATA</center></th>
			</tr>
			<tr>
				<th>SNO</th>
				
				<th>SECTION</th>
			
				<th>Status</th>
				<th>Change Status</th>
			</tr>";
				$i=1;
		while($row = mysqli_fetch_array($result))
		{
			echo 
			"<tr>
				<td>".$i."</td>
				
				<td>".$row['section']."</td>
			
				<td>";
					if($row['status']==1)
					{
						echo "Active";
					}
					else
					{
						echo "Not Active";
					}
				echo "</td>
				<form action='change_section_status.php' method='POST'>
				<td><select name=status>
					<option value='0'>Deactivate</option>
					<option value='1'>Activate</option>
				</select>
				<input type='hidden' value='$row[section]' name='section'>
				</td>";
		}
		echo "</table><center><input class='btn btn-info' type='submit' name='btn' value='save changes'></center>";
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
<body></body></html>