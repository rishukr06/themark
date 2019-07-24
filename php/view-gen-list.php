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
include './connection.php';


		$sql = "select distinct(date) as gdate from Attandance order by date;";

		

		
		$result = mysqli_query($con,$sql) or die('Error while fetching data...');
echo "<table border='2' class='table table-responsive-md table-striped'>
			<tr>
				<th colspan='3'><a href='superUser.php' class='btn btn-info'>back</a><center>Attandance Genrated For following dates</center></th>
			</tr>
			<tr>
				<th>SNO</th>
				<th>DATE</th>
				<th style='color:red;'>DELETE</th>
				
			</tr>";
				$i=1;
		while($row = mysqli_fetch_array($result))
		{
			echo 
			"<tr>
				<td>".$i."</td>
				<td>".$row['gdate']."</td>
				<td>
				";

				if($row['gdate']<=date("Y-m-d"))
				{
					echo "can not delete";
				}
				else
				{
					echo "
					<form action='delete-attandance-list.php' method='POST'>
						<input type='hidden' name='date' value='$row[gdate]'>
						<input type='submit' class='btn btn-danger' name='d-btn' value='Delete'>
					</form>
					";
				}

				echo"
				</td>
				</tr>";
				$i++;
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Mark--attandance date list</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>
	
</body>
</html>
