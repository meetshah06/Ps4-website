<?php	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "CREATE DATABASE IF NOT EXISTS myDB";
	if ($conn->query($sql) === TRUE) {
	} else {
	echo "Error creating database: " . $conn->error;
	}
	
	$dbname = "myDB";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "CREATE TABLE IF NOT EXISTS myT(name VARCHAR(30) NOT NULL,email VARCHAR(30) NOT NULL,message VARCHAR(30) NOT NULL)";
	if ($conn->query($sql) === TRUE) {
	} else {
	echo "Error creating table: " . $conn->error;
	}

	if($_POST['loginbtn'])
  	{
  		$name = $_POST['fname'];
  		$email = $_POST['email'];
  		$message = $_POST['text'];
  		$sql = "INSERT INTO myT (name,email,message)VALUES ('$name','$email','$message')";

		if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully <br> $name - $email - $message";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}	
  	}
	$conn->close();
	?>
