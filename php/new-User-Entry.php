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
	<title>The Mark-New User Entry</title>
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
					  <h3 class="text text-primary font-weight-bold">New User Entry</h3>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation" novalidate>
					<div class="form-group">
      					<input type="text" class="form-control" id="uname" placeholder="Enter UID" name="uid" required>
      					
      				</div>
      				<div class="form-group">
				      <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" required>
				    </div>
				   
				    
				    <div class="form-group">
				      <input type="password" class="form-control"  name="password" placeholder="Password" required>
				    </div>
				    
				    
				     <div class="form-group">
				      <input type="text" class="form-control"  name="confirm_password" placeholder=" Confirm Password" required>
				    </div>
				    
				    	<?php 
				    		if($i==1)
				    		{
				    			echo "

				    			<div style='padding-left: 12%;' style='color:red'>password does not matched</div>

				    			";
				    		}
				    	?>

				     <div class="form-group">
				      <label class="form-control" style="border:none;"><b>User Type:</b></label>
				    </div>

				    <div class="form-group" style="display: flex;padding: 0;">
				    <label class="form-control" style="border:none;position: relative;left:80px;"><b>Teacher:</b></label>
				      <input type="radio" value="client" class="form-control" style="position: relative;left:20px;" id="user_type"  name="user_type" checked="checked">
				       <label class="form-control" style="border:none;position: relative;left:40px;"><b>SuperUser:</b></label>
				      <input type="radio" class="form-control" style="position: relative;left:0px;"  name="user_type" value="super_user" >   
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

	if($password==$confirm_password)
	{
		$sql ="insert into users values('$uid','$name','$password','$user_type');";

		$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));

		if(empty($result))
		{
			echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-danger'>
						<h4>Error</h4>
						<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
					</div>
			</div>";
		}
		else
		{
			
			echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-success'>
						<h4>User Registration Successful</h4><br>
						<h5>Want to register again?</h5>
						<button style='left:0;' class='rishu-btn bg-info' onclick='closeBox(msgBox)'>Yes</button>
							<a href='./superUser.php' style='left:12%;text-decoration:none;' class='rishu-btn-error bg-danger'>NO</a>
					</div>
			</div>";
		}
	}
	else
	{
		echo "<div id='msgBox' class='error-box'>
					<div class='error-msg-box alert-danger'>
						<h4>Error Passwords does not matched..</h4>
						<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
					</div>
			</div>";
		
	}
}
?>