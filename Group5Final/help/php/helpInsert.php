<!DOCTYPE html>
<head>
	<title>insert</title>
</head>
<body>

	<?php 

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="cab";

	$conn= new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}

	echo "Thank you for your idea.";

	$name=$_POST['name'];

	$email=$_POST['email'];

	$comment=$_POST['comment'];



	$querry=mysqli_query($conn,"INSERT INTO comments(Name,Email,Comment) VALUES ('$name','$email','$comment')");

	if(!$querry){
		echo "Insertion failed";
	}

	 ?>

</body>
</html>