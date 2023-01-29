<?php

$login= false;
$showError=false;

$host = "localhost";
$user = "root";
$password = "rafat";
$db = "online-voting-system";


$data = mysqli_connect($host, $user, $password, $db);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_id = $_POST['user_id'];
	$pass = $_POST['password'];

	$sql= "SELECT * FROM admin WHERE id= '".$user_id."'  AND pass= '".$pass."' ";

	$result= mysqli_query($data,$sql);
	$row= mysqli_fetch_array($result);
	$num= mysqli_num_rows($result);
    if($num == 1)
    {
      $login= true;
      session_start();
      $_SESSION['loggedin']= true;
      $_SESSION['username']= $username;
      header("location:admin.php");
    }

	else
    	{
          	echo "<b>Username and Password are not matched</b>";
  
    	}
}
	


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login here</title>
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../style2.css">
	<style>
		body{
			background: url(../Picture/04.jpg);
  background-repeat: no-repeat;
  background-size: 100%;
		}
	</style>

</head>
<body>
	<?php
    if($login)
    {
 	echo '
    	<div class="alert alert-success alert-dismissible fade show" role="alert">
  		<strong>Success!</strong> You are loged in now
 	 	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
   		<span aria-hidden="true">&times;</span>
  		</button>
		</div>
  		';
	}

    if($showError)
    {
 		echo '
    		<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>Error</strong> '.$showError.'
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  			</button>
			</div>';
	}
	?>
&nbsp;&nbsp;&nbsp;<img src="../Picture/02.png" height="150px" width="100%">
	<hr>

<center>
	<div id="header">
		<h1>Online Voting System</h1><br><br>
		<marquee width= "400px"><b><i><h3>Admin Login Here Only</h3></i></b></marquee>
	</div>
	
</center>

	<br><br>
<div class="form-container">
	<form action="#" method="POST" name="login" onsubmit="return validate()">
		<h3>Login Here</h3>
		<div>
			
			<input type="number" name="user_id" required placeholder="Enter Your User Id">
		</div>
		<br>
		<div>
			
			<input type="password" name="password" required placeholder="Enter Your Password">
		</div>
		<br>
		<div>
		
			<input type="submit" Value="login" class="form-btn">

		</div><br>
	</form><br><br>
	
</div>
<script type="text/javascript">
	function validate() 
	{
		var user_id = document.forms["login"]["user_id"].value;

		if (user_id == "") 
		{
			alert("PLEASE FILL THE NID FIELD");
  			return false;
		}

		if (isNaN(user_id)) 
		{
			alert("User Id Content only digits");
			return false;
		}

		if (user_id.length!=9 && user_id.length!=10) 
		{
			alert("Please Insert 9 or 10 Digits Number");
			return false;
		}
	}
</script>
</body>
</html>