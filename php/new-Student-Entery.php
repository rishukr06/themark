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
	<title>The Mark-New Student Entry</title>
	<?php include './links.php';?>
	<link rel="stylesheet" type="text/css" href="../css/mark-main.css"> 
</head>
<body>


	<div class="container-fluid">
		<div class="title" style="margin-top:20px;">
			<h1 class="text text-primary font-weight-bold">The Mark</h1>
		</div>
		<div class="container">
			<div class="form-holder">
				<div class="header">
					  <h3 class="text text-primary font-weight-bold">New Student Entry</h3>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation" novalidate>
					<div class="form-group">
      					<input type="text" class="form-control" id="uname" placeholder="Enter Regestration no" name="uid" required>
      					<!-- <div class="invalid-feedback">Please fill out this field.</div> -->
      				</div>
      				<div class="form-group">
				      <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" required>
				    </div>
				    <div class="form-group">
				      <input type="email" class="form-control" id="" placeholder="Enter Email" name="email" required>
				    </div>
				     <div class="form-group">
				      <input type="text" class="form-control" id="" placeholder="TermID" name="termid" required>
				    </div>
				    <div class="form-group">
				     
				      <!--section-->
				      <?php
				      include './connection.php';
				      $sql1 = 'select * from section';
						$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
						echo "<select name='section' class='form-control'>";
						while($row1 = mysqli_fetch_array($result1))
						{
							echo "<option>". $row1[section]."</option>";
						}
						echo "</select>";
				      ?>

				    </div>
				     <div class="form-group">
				     <select class="form-control" name="sgroup">
				     	<option value="1">Group-1</option>
				     	<option value="2">Group-2</option>
				     	<option value="3">Group-3</option>
				     </select>
				    </div>
				     <div class="form-group">
				      <input type="text" class="form-control" id="" placeholder="Enter Course code" name="cc" required>
				    </div>
				     <div class="form-group">
				      <input type="text" class="form-control" id="" placeholder="Enter Roll no" name="roll" required>
				    </div>
				     <div class="form-group">

				     
				      <!--section-->
				      <?php
				
				      $sql1 = 'select * from hospital order by name';
						$result1 = mysqli_query($con,$sql1) or die('Error while fetching data...');
						echo "<select name='hospi_name' class='form-control'>";
						while($row1 = mysqli_fetch_array($result1))
						{
							echo "<option>". $row1[name]."</option>";
						}
						echo "</select>";
				      ?>

				    </div>
				    <div class="form-group">
				      <input type="number" class="form-control" maxlength="10" name="mobi" placeholder="+91 | Mobile" required>
				    </div>
				    
					    <button name="btn" type="submit" class="rishu-btn" onclick="load(spinner)" style="left: 0;transform: none;float: left;margin-left: 20px;text-decoration: none;">
					    	<span id="spinner" style="display: none;" class="spinner-border spinner-border-sm"></span>  Submit
						</button>
						<a href="superUser.php" class="rishu-btn-error btn-danger" style="left: 0;transform: none;float: right;margin-right: 20px;text-decoration: none;">
							  Cancel
						</a>
					
				</form>
			</div>
		</div>
	</div>
	<script src="../js/login-form-validate.js"></script>
</body>
</html>

<?php
if(isset($_POST['btn']))
{
	extract($_POST);

	include './connection.php';

	$sql ="insert into students values('$uid','$name','$section','$email','$mobi','$hospi_name','1','$termid','$cc','$roll','$sgroup');";

	$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));

	if(empty($result))
	{
		echo "<div id='msgBox' class='error-box'>
				<div class='error-msg-box alert-danger'>
					<h4>Error While inserting data...</h4>
					<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
				</div>
		</div>";
	}
	else
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
						<h4>Student Registration Successful</h4><br>
						<h5>Want to register again?</h5>
						<button style='left:0;' class='rishu-btn bg-info' onclick='closeBox(msgBox)'>Yes</button>
							<a href='./superUser.php' style='left:12%;text-decoration:none;' class='rishu-btn-error bg-danger'>NO</a>
					</div>
			</div>";
	}
}
?>