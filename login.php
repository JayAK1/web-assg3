<html>
 <body>



<?php

$servername = "localhost";
$username = "assignm2_assig2";

$conn = new mysqli($servername, $username, "v6lh7Q--e,Oa", "assignm2_guestbook");


 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
 ?> 
<?php
$login=$_POST["loginname"];
$username = $_POST["username"];
$email=$_POST["email"];
$message=$_POST["message"];

$sql = "SELECT loginname FROM guests WHERE loginname='$login'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
			$msgg = "SELECT loginname, message FROM guests WHERE loginname='$login'";
			$msg=$conn->query($msgg);
			$res=mysqli_fetch_assoc($msg);
			echo "Login name already exists! Message: ". $res["message"];
}else{

	$sql = "INSERT INTO guests (loginname, username, email, message)
	VALUES ('$login', '$username', '$email', '$message');";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>

 </body>
 </html> 