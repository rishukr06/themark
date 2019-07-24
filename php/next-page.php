<?php

if(isset($_POST['save-btn']))
{
	 extract($_POST);
	 $date = $_POST['date'];
	 $count = count($_POST['uid']);

	 include './connection.php';

	 for($i=0;$i < $count; $i++)
	 {

	 	$sql = "insert into Attandance values ('$uid[$i]', '$name[$i]', '$hname[$i]', '$date','absent','$section[$i]','0','not_marked');";

	 	$result = mysqli_query($con,$sql) or die ("Error while Inserting data...".mysqli_error($con));
	 }

	if(!empty($result))
	{
		echo "new data inserted...";
	}
	echo "<br><a href='superUser.php'>Go Back</a>";
}
?>
