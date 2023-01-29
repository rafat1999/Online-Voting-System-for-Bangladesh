<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="../style2.css">
	<title>Vote Results</title>
</head>
<body>
	<div id="headerSection">
		<center>
			<h1>Online Voting System</h1>
              
            </div>
            <hr>
            <br><br><br>
            
           
	<table border="2" align="center" width="50%" height="150px" bgcolor="#7FFD4">
  <tr>
    <td><font face="Time New Romans" size="6"><center><b>Group Name</b></center></font></td>
    <td><font face="Time New Romans" size="6"><center><b>Votes</b></center></font></td>
    

 <?php

include "../api/connection.php"; // Using database connection file here

$records = mysqli_query($connect,"SELECT name, votes FROM user WHERE role = 2"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><center><font face="Time New Romans" size="4"><b><?php echo $data['name']; ?></b></font></center></td>
    <td><center><font face="Time New Romans" size="4"><b><?php echo $data['votes']; ?></b></font></center></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($connect); // Close connection ?>

</center>

</body>
</html>