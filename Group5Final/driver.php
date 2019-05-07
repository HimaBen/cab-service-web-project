<html>
<head>
	<title>driver</title>
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
			<td><a id="a1" href="About.html">About us</a></td>
                        <td><a id="a1" href="login\new\Login.php">Login</a></td>
			<td><a id="a1" href="help\pages\help.html" target="_parent">Contact us</a></td>
			
		</tr>
	</table>
	<h1>Driver Register</h1>
	<br>
	<p> only you can register cars & vans!
	
	<form method="POST" action="driver.php">
		<table>
			<tr>
				<td><label for="name">Name:</label></td>
				<td><input type="text" class="form-control" name="name"></td>
			</tr>
			<tr>
				<td><label for="address">Address:</label></td>
				<td><input type="text" class="form-control"  name="address"></td>
			</tr>
			<tr>
				<td><label for="nic">NIC:</label></td>
				<td><input type="text" class="form-control"  name="nic"></td>
			</tr>
			<tr>
				<td><label for="vt">vehicle type:</label></td>
				<td><select name="vt" >
                    <option value="car">car</option> 
                     <option value="van">van</option>
                    </select></td>
			</tr>
			<tr>
				<td><label for="phone">Phone:</label></td>
				<td><input type="text" class="form-control"  name="phone"></td>
			</tr>
			<tr>
				<td><label for="username">Username:</label></td>
				<td><input type="text" class="form-control"  name="un"></td>
			</tr>
			<tr>
				<td><label for="password">Password:</label></td>
				<td><input type="password" class="form-control"  name="pd"></td>
			</tr>
		</table>
		
		
		<button name="submit_btn" type="submit" value="Submit" class="btn">Register</button>
		
		
	</form>
      <br />
      


<form method="post" action="driver.php">
			Enter username: <input type="text" name="uname"><br><br>
			<button type="submit" name="sub">Search your details</button>
			
		</form>
		</div>
		<?php

			$conn = mysqli_connect ("localhost", "root", "", "cab") or die ("cannot connect");

			if (null !==(filter_input(INPUT_POST, 'sub'))){
					$uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'uname'));
					$sql = "SELECT name,nic,vehicletype,phone,address,username,password FROM driver WHERE username='$uname';";
					$result=mysqli_query($conn,$sql);
					$queryResult=mysqli_num_rows($result);
					if ($queryResult>0){
						echo "<p style=\"font-size:18px;text-align:center\">you successfully registered</p>";
						echo "<div class=\"rest\">";
						echo "<table style=\"width:100%\">";
						echo "<thead><th>name</th><th>address</th><th>vehicle type</th><th>nic</th><th>phone</th><th>username</th><th>password</th></thead>";
						while ($row=mysqli_fetch_assoc($result)){
							
							$name = $row["name"];
							$address = $row["address"];
							$vt = $row["vehicletype"];
							$nic =$row["nic"];
							$phone = $row["phone"];
							$uname = $row["username"];
							$password = $row["password"];
					    echo "<tr><td style=\"text-align:center\">".$name."</td>
						      <td style=\"text-align:center\">".$address."</td>
							  <td style=\"text-align:center\">".$vt."</td>
							  <td style=\"text-align:center\">".$nic."</td>
							  <td style=\"text-align:center\">".$phone."</td>
							  <td style=\"text-align:center\">".$uname."</td>
							  <td style=\"text-align:center\">".$password."</td></tr>";    
							}
						echo "</table>";
						echo "</div>";
					}else {
						echo "<p style=\"text-align:center\">customer not available</p>";
					}
				}









			
		?>	 
</body>
</html>
<?php
	 if (isset($_POST["submit_btn"]))
	{
                $name = $_POST["name"];
				$address = $_POST["address"];
				$nic = $_POST["nic"];
				$vt = $_POST["vt"];
                $phone = $_POST["phone"];
				$uname = $_POST["un"];
				$password = $_POST["pd"];

		
		$conn = mysqli_connect("localhost", "root", "", "cab") or die("Error");
		$sql = "INSERT INTO driver(name,nic,vehicletype,phone,address,username,password) VALUES ('$name','$nic','$vt','$phone','$address','$uname','$password')";
		$result = mysqli_query($conn, $sql );	
		 
	}
	
	






 ?>