<?php
session_start();
session_start();
if(!isset($_SESSION['user']))
{

	header('location:../');
}
if(!isset($_SESSION['user_type']))
{
	
	header('location:../');
}
if($_SESSION['user_type']!='client')
{
	header('location:../');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		The Mark-Teacher</title>
	<?php include './links.php';?> 
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 

</head>
<body class="">
	
	<div class="container r-nav">
		<nav class="rr-nav">
			<a href="#" class="text text-prmary" style="float: left;font-weight: 900;text-decoration: none;">The Mark</a>

			<a href="logout.php" class=" text-danger" style="float: right;">Logout</a> 

			<a href="#" style="float: right;padding-right:10px">Welcome, <?php echo $_SESSION['user']; ?></a>
		</nav>
	</div>
	<div class="container" style="box-shadow: 0px 0px 8px #ccc; padding: 15px;margin-top:10px;">
		<div class="row" style="justify-content: center;">
			

			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="mark-attandance.php" method="post">
						<center><h5>Take Attandance</h5></center><br>
						<center>
							 <input type="date" required name="date"/><br><br>

							 <?php
						      include './connection.php';
						      $sql1 = 'select * from  time';
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='time'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[time]."</option>";
								}
							echo "</select>";
				     		?><br><br>

							<?php
						      include './connection.php';
						      $sql1 = 'select * from  hospital order by name';
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='hname'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[name]."</option>";
								}
							echo "</select>";
				     		?>
						</center><br>
						<input type="submit" class="rishu-btn" name="btn" value="Mark Attandance">
					</form>
			</div>
			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="view-attandance-hospital.php" method="post">
						<center><h5>view Attandance Hospital Wise</h5></center><br>
						<center>
							 <input type="date" required name="date"/><br><br>

							 <?php
						      include './connection.php';
						      $sql1 = 'select * from  time';
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='time'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[time]."</option>";
								}
							echo "</select>";
				     		?><br><br>

							<?php
						      include './connection.php';
						      $sql1 = 'select * from  hospital order by name';
							$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
							echo "<select name='hname'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[name]."</option>";
								}
							echo "</select>";
				     		?>
						</center><br>
						<input type="submit" class="rishu-btn" name="v-a-hosp-btn" value="View">
					</form>
			</div>



			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="view-attandance-section.php" method="post">
						<center><h5>view Attandance Section Wise</h5></center><br>
						<center>
							 <input type="date" required name="date"/><br><br>


							 <?php
						      include './connection.php';
						      $sql1 = 'select * from  time';
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='time'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[time]."</option>";
								}
							echo "</select>";
				     		?><br><br>

							<?php
						      include './connection.php';
						      $sql1 = "select * from  section where status='1'";
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='sname'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[section]."</option>";
								}
								echo "</select>";
				     		?>
						</center><br>
						<input type="submit" class="rishu-btn" name="v-a-section-btn" value="View">
					</form>
			</div>
		</div>
	</div>
</body>
</html>