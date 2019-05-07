<?php
   include("Config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT no FROM driver WHERE username = '$myusername' and password = '$mypassword'";
      $results = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($results);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         /*session_register("$myusername");*/
         $_SESSION['login_user'] = $myusername;
        if ($myusername==admin){ 
		header("location: ../admin/admin.html");
		}
	   else{
		   header("location: ../../driverh.php");
	   }
		 
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
	<head> 
		<title>login </title>
		<link rel="stylesheet" type="text/css" href="../style.css"/>
                <script type="text/javascript" src="Jv.js"></script>
    </head> 
    <body> 
		<div class="login-box">
		<img src="../pmlog_key.png" class="avatar">
		    <h1>Login Here</h1>
				<form name="log" onSubmit="" action="Login.php" method="POST">
				<p>User Name</p>
				<input type="text" name="username" placeholder="Enter User Name"  size="30" maxlength="25">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="loginBtn" value="Login" >
				<a href="#" >Forgot Password</a><br>
                                <a href="../Home.html" target="_parent" >Back to home</a>
				</form>		
		</div> 
	</body>
	
</html>

