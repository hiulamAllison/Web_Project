<?php
session_start();
$un = $_SESSION["username"];
// Create connection
$conn = mysqli_connect("localhost", "root", "", "sportilife");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$room = $_POST['Room']; 
$building = $_POST['Building']; 
$street = $_POST['Street']; 
$city = $_POST['City']; 
$region = $_POST['Region']; 
$country = $_POST['Country']; 


    $sql="UPDATE customer INNER JOIN address ON (customer.CustomerID = address.CustomerID)
SET 
  
  address.Room = $room, address.Building = $building, address.Street = $street, address.City = $city, address.Region = $region,
      address,Country = $country
WHERE login.UserName = \"".$un."\"
AND customer.CustomeID  = login.CustomerID";
    
    if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
//header( 'Location: profile.php' ) ;

?>
