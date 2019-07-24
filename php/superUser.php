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
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		The Mark-superUser
	</title>
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
				<center>
				<h3> New Entry </h3><br>
				<a href="new-User-Entry.php" class="btn btn-info">Add User</a>	<br><br>
				<a href="new-Student-Entery.php" class="btn btn-info">Add Student</a>	

			</center>
			</div>

			<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="asign-hospital.php" method="post">
						<center><h5>Genrate attandance list</h5></center><br>
						<center><input type="date" required name="date"/></center><br>
						<input type="submit" class="rishu-btn" name="btn" value="Genrate">
					</form><hr>
					<center><h6>Check on which dates list has been genrated</h6></center>
					<center><a href="view-gen-list.php" class="btn btn-info" > Check Lists</a></center>
			</div>

				<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="update-hospital.php" method="post">

						<center><h5>Update Hospital for students</h5></center><br>
						<center>	
							<center><h6>Select Section<h6></center>
							<?php
						      include './connection.php';
						      $sql1 = "select * from  section where status='1'";
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='sname'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1['section']."</option>";
								}
								echo "</select>";
				     		?>
				     		</center>
				     		<br>
				     		<center><h6>Roll No.<h6></center>
				     		<center>
				     		<div style="display: flex;">
				     			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				     			<i>From:</i><input type="number" name="sroll" style="width: 60px;">
				     			&nbsp;&nbsp;&nbsp; <i>To:</i><input type="number" name="eroll" style="width: 60px;">
				     		</div>
				     	</center><br>
						<center>
							<center><h6>Select Hospital<h6></center>
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
						
				     		
						<input type="submit" class="rishu-btn" name="btn" value="Update Hospital">
					</form>
			</div>

			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="mark-attandance.php" method="post">
						<center><h5>Take attandance</h5></center><br>
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

			<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="new-section-entry.php" method="post">
						<center><h2>ADD SECTION</h2></center><br>
						<center><input type="text" required name="section" placeholder="new section" /></center><br>
						<input type="submit" class="rishu-btn" name="btn" value="GO">
					</form>
			</div>

			<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="new-hospital-entry.php" method="post">
						<center><h2>ADD HOSPITAL</h2></center><br>
						<center><input type="text" required name="hname" placeholder="new hospital name" /></center><br>
						<input type="submit" class="rishu-btn" name="btn" value="GO">
					</form>
			</div>

			<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="activate_deactivate.php" method="post">
						<center><h2>Activate/Deactivate Students</h2></center><br>
						<center><input type="number" required name="uid" placeholder="Reg.No." /></center><br>
						<input type="submit" class="rishu-btn" name="btn" value="GO">
					</form>
			</div>

			<div class="col-md-4" style="padding:20px;margin-top: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
					<form action="activate_deactivate_section.php" method="post">
						<center><h3>Activate/Deactivate Section</h3></center><br>
						<center>
							<?php
						      include './connection.php';
						      $sql1 = 'select * from  section';
								$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
								echo "<select name='sname'>";
								while($row1 = mysqli_fetch_array($result1))
								{
									echo "<option>". $row1[section]."</option>";
								}
								echo "</select>";
				     		?></center><br>
						<input type="submit" class="rishu-btn" name="btn" value="GO">
					</form>
			</div>
			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
				<center>
				<form action="Download-attandance-section.php" method="post">
						<center><h5>Download Attandance List Section Wise</h5></center><br>
						<center>
							 <input type="date" required name="date"/><br><br>

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
						<input type="submit" class="rishu-btn" name="v-a-section-btn" value="Download">
					</form>
				

			</center>
			</div>
			<div class="col-md-4" style="padding: 20px;margin-left: 10px; background-color: #ccc; max-width: 300px;margin-top:20px;">
				<center>
				<form action="Download-attandance-hospital.php" method="post">
						<center><h5>Download Attandance List Hospital Wise</h5></center><br>
						<center>
							 <input type="date" required name="date"/><br><br>

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
						<input type="submit" class="rishu-btn" name="v-a-section-btn" value="Download">
					</form>
				

			</center>
			</div>
		</div>
	</div>
</body>
</html>