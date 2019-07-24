<!DOCTYPE html>
<html>
<head>
	<title>The Mark</title>
	<?php include './php/links.php';?> 
</head>
<body>
	<div class="container-fluid">
		<div class="title">
			<h1 class="text text-primary font-weight-bold">The Mark</h1>
		</div>
		<div class="container">
			<div class="form-holder">
				<div class="header">
					  <h3 class="text text-primary font-weight-bold">Login</h3>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation" novalidate>
					<div class="form-group">
      					<input type="text" class="form-control" id="uname" placeholder="Enter UID" name="uname" required>
      					<!-- <div class="invalid-feedback">Please fill out this field.</div> -->
      				</div>
      				<div class="form-group">
				      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
				    </div>
				    <button name="btn" type="submit" class="rishu-btn" onclick="load(spinner)">
				    	<span id="spinner" style="display: none;" class="spinner-border spinner-border-sm"></span>  Submit
					</button>
				</form>
			</div>
		</div>
	</div>
	<script src="./js/login-form-validate.js"></script>
</body>
</html>

<?php
if(isset($_POST['btn']))
{
	$password = $_POST['pswd'];

	include './php/connection.php';

	$sql ="select * from users where uid='".$_POST['uname']."'";

	$result = mysqli_query($con,$sql) or die ("Error while fetching data...");

	if(empty($result))
	{
		echo "<div id='msgBox' class='error-box'>
				<div class='error-msg-box alert-danger'>
					<h4>Login Credentials Not Correct</h4>
					<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
				</div>
		</div>";
	}
	else
	{
		while($row = mysqli_fetch_array($result))
		{
			$dpwd = $row['password'];
			$type = $row['user_type'];
		}
		if($dpwd == $password)
		{
			if($type=="super_user")
			{
				
				session_start();
				$_SESSION['user']=$_POST['uname'];
				$_SESSION['user_type']='super_user';
				header('location:./php/superUser.php');
			}
			else
			{
				session_start();
				$_SESSION['user']=$_POST['uname'];
				$_SESSION['user_type']='client';
				header('location:./php/teacher.php');
			}
		}
		else
		{
			echo "<div id='msgBox' class='error-box'>
				<div class='error-msg-box alert-danger'>
					<h4>Login Credentials Not Correct</h4>
					<button class='rishu-btn-error bg-danger' onclick='closeBox(msgBox)'>close</button>
				</div>
			</div>";
		}
	}
}

?>