<html>
<head>
	<title>driver</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<style>
	form {
    margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left: 50px;}
	</style>
</head>
<body>
		<h1>Manage Driver</h1>
	<br>
	
	<form method="post" action="driver.php">
			Enter username: <input type="text" name="uname"><br><br>
			<button type="submit" name="sub">Search Driver</button>
			
		</form>
		</div>
		<?php

			$conn = mysqli_connect ("localhost", "root", "", "cab") or die ("cannot connect");

			if (null !==(filter_input(INPUT_POST, 'sub'))){
					$uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'uname'));
					$sql = "SELECT * FROM driver WHERE username='$uname';";
					$result=mysqli_query($conn,$sql);
					$queryResult=mysqli_num_rows($result);
					if ($queryResult > 0){
						echo "<p style=\"font-size:18px;text-align:center\">Driver is available</p>";
						echo "<div class=\"rest\">";
						echo "<table style=\"width:100%\">";
						echo "<thead><th>Username</th><th>password</th></thead>";
						while ($row=mysqli_fetch_assoc($result)){
							$uname = $row['username'];
							$contact_number = $row['password'];
					    echo "<tr><td style=\"text-align:center\">".$uname."</td><td style=\"text-align:center\">".$contact_number."</td></tr>";    
							}
						echo "</table>";
						echo "</div>";
					}else {
						echo "<p style=\"text-align:center\">Driver not available</p>";
					}
				}









			
		?>

		<hr>

		<h1 style="text-align:center">Change Details</h1>	
		<form action="driver.php" method="post">
			<div class="center" style="text-align:center">
				<h3 style="text-align:center;">Enter Details to change</h3>
				User Name: <input type="text" name="uname" value="" style="margin-left:50px" required/><br><br>
				NIC: <input type="text" name="nic" value="" style="margin-left:50px" required/><br><br>
				contact Number: <input type="text" name="contact_number" value="" style="margin-left:50px" required/><br><br>
				
				Password: <input type="password" name="pw" value="" style="margin-left:60px" required/><br><br>
				
				
				<button type="submit" name="edit" style="width:210px">Change Driver Details</button>
				
				
			</div>
		</form>

		
	</body>
</html>

<?php

 $conn = mysqli_connect ("localhost", "root", "", "cab") or die ("cannot connect");

	if (null !==(filter_input(INPUT_POST, 'edit'))){
		$uname = filter_input(INPUT_POST,'username');
		$nic = filter_input(INPUT_POST,'nic');
		$contact_number = filter_input(INPUT_POST,'contact_number');
		$email = filter_input(INPUT_POST,'email');
		
		
		$sql = "UPDATE driver SET username='$uname', nic='$nic',email='$email',Contact_number='$contact_number' WHERE username='$uname';";

		$mysqli_query = mysqli_query($conn, $sql);
	
		if (!$mysqli_query){
					echo "<script>alert(\"Error Occured!\");</script>";
				}else {
					$tvidr = mysqli_insert_id($conn); 
					echo "<script>alert(\"Successfully updated!\");</script>";
				}
	}

	

	$mysqli_close = mysqli_close($conn);
?>
<h1 style="text-align:center">Delete Driver Details</h1>

				<div class="center" style="padding-right:0px">
				<form action="driver.php" method="post">
					<p style="font-size:18px;display: inline">Enter username to delete: </p>
					<input type="text" name="dname"><br><br>
					<button type="submit" name="del">Delete Driver</button>
					
				</form>
				</div>
<?php


$conn = mysqli_connect ("localhost", "root", "", "lg") or die ("cannot connect");

	if (null !==(filter_input(INPUT_POST, 'del'))){
        $dname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'dname'));
        $sql1 = "DELETE FROM driver WHERE username='$dname';";
        $result2 = mysqli_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully deleted!\");</script>";
        }
    }

    
	$mysqli_close = mysqli_close($conn);
?>
</body>
</html>