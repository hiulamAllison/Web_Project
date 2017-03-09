<?php

session_start();


   $conn = mysqli_connect("localhost", "root", "","sportilife");
   if ($conn->connect_error)  {
	echo "Unable to connect to database";
   	exit;
   }



//$_SESSION["username"] = $_POST["username"];
//$_SESSION["password"] = $_POST["password"];
//
//$username = $_SESSION["username"];
//$password = $_SESSION["password"];



$username = $_GET["username"];
$password = $_GET["password"];
// move to success case
$_SESSION["username"]=$username;
$_SESSION["password"]=$password;

$query = "SELECT * FROM login WHERE UserName ='$username' AND Password='$password'";

$result = $conn->query($query);
$row = $result->fetch_assoc();

if (!$result) die (

"Your username or password is not valid"


);




if (mysqli_num_rows($result)==0) { 
	echo "Your username or password is not valid.Please enter again.";
	return;
}

else

{
 
//header("Location: homepage.html");
//exit();
	echo "success";
	//for other page checking
	$_SESSION["loginStatus"] = true;
}

mysqli_free_result($result);
   mysqli_close($conn);


?>