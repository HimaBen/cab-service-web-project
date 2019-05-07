<html>
<head>
	<title>book</title>
	<link rel="stylesheet" type="text/css" href="CSS\style.css">
        <link rel="stylesheet" type="text/css" href="CSS\mainstyle.css">
	<style>
	form {
    margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 50px;
    margin-left: 50px;}
	</style>
</head>
<body>

        <table id="t1">
		<tr>
			<td><img src="Images\logo.jpg" height=100 width=100></td>
			<td><h1><font color="#8919E9">Colombo</font> Cabs</h1></td>
                        <td><a id="a1" href="Home.html">Home</a></td>	
			<td><a id="a1" href="About.php">About us</a></td>
			<td><a id="a1" href="help\pages\help.html" target="_parent">Contact us</a></td>
			<td><a id="a1" href="login\new\welcome.html" target="_parent">Logout</a></td>
		</tr>
	</table>
	<h1>booking</h1>
	<br>
	<p> only you can register cars & vans!
	
	<form method="POST" action="booking.php">
		<table>
			<tr>
				<td><label for="name">Name:</label></td>
				<td><input type="text" class="form-control" name="customer_name"></td>
			</tr>
			<tr>
				<td><label for="nic">nic:</label></td>
				<td><input type="text" class="form-control" name="bookingid"></td>
			</tr>
			<tr>
				<td><label for="pickup_location">pickup location:</label></td>
				<td><input type="text" class="form-control"  name="pickup_loc"></td>
			</tr>
			<tr>
				<td><label for="dl">drop location</label></td>
				<td><input type="text" class="form-control"  name="drop_loc"></td>
			</tr>
			<tr>
				<td><label for="vt">vehicle type:</label></td>
				<td><select name="car_type" >
                    <option value="car">car</option> 
                     <option value="van">van</option>
                    </select></td>
			</tr>
			<tr>
				<td><label for="pd">pickup_date:</label></td>
				<td><input type="text" class="form-control"  name="pickup date"></td>
			</tr>
			<tr>
				<td><label for="pt">pickup time:</label></td>
				<td><input type="text" class="form-control"  name="pickup time"></td>
			</tr>
			<tr>
				<td><label for="mg">message:</label></td>
				<td><input type="text" class="form-control"  name="message"></td>
			</tr>
		</table>
		
		
		<button name="submit_btn" type="submit" value="Submit" class="btn">book</button>
		
		
	</form>
      <br />
      <h1 style="text-align:center">View booking</h1>
		<div class ="center">
		<form method="post" action="booking.php">
			Enter nic: <input type="text" name="bookingid"><br><br>
			<button type="submit" name="sub">Search recervation</button>
			
		</form>
		</div>



		<?php 

 $conn = mysqli_connect ("localhost", "root", "", "cab") or die ("cannot connect");

			if (null !==(filter_input(INPUT_POST, 'sub'))){
					$bookingid=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'bookingid'));
					$sql = "SELECT nic,customer_name,pickup_loc,drop_loc,pickup_date,pickup_time,car_type,message FROM booking WHERE nic='$bookingid';";
					$results=mysqli_query($conn,$sql);
					$queryResult=mysqli_num_rows($results);
					if ($queryResult > 0){
						
						echo "<div class=\"rest\">";
						echo "<table style=\"width:100%\">";
						echo "<tr><th>nic</th><th>customer_name </th><th>pickup_loc</th><th>drop_loc</th><th>pickup_date</th><th>pickup_time</th><th>car_type</th><th>message</th><th>driver</th><th>driverid</th></tr>";
						while ($row=mysqli_fetch_assoc($results)){
							$bookingid = $row['nic'];
							$customer_name = $row['customer_name'];
							$pickup_loc = $row['pickup_loc'];
							$drop_loc = $row['drop_loc'];
							$pickup_date = $row['pickup_date'];
							$pickup_time = $row['pickup_time'];
							$car_type = $row['car_type'];
							$message = $row['message'];
							$driver = $row['driver'];
							$driverid = $row['driverid'];
							echo "<tr><td>".$bookingid."</td><td>".$customer_name."</td><td>".$pickup_loc."</td><td>".$drop_loc."</td><td>".$pickup_date."</td><td>".$pickup_time."</td><td>".$car_type."</td><td>".$message."</td><td>".$driver."</td><td>".$driverid."</td></tr>";    
							}
						echo "</table>";
						echo "</div>";
					}
				}

		?>
</body>
</html>
<?php
	 if (isset($_POST["submit_btn"]))
	{
		        $bookingid = $_POST['bookingid'];
                $customer_name = $_POST['customer_name'];
				$pickup_loc = $_POST['pickup_loc'];
				$drop_loc = $_POST['drop_loc'];
				$pickup_date = $_POST['pickup_date'];
				$pickup_time = $_POST['pickup_time'];
				$car_type = $_POST['car_type'];
				$message = $_POST['message'];
				
		$conn = mysqli_connect("localhost", "root", "", "cab");
		$sql = "INSERT INTO booking(nic,customer_name,pickup_loc,drop_loc,phone,pickup_date,pickup_time,car_type,message) VALUES ('$bookingid','$customer_name','$pickup_loc','$drop_loc','$pickup_date','$pickup_time','$car_type','$message')";
		$result = mysqli_query($conn, $sql );
		
	}
	
	






 ?>