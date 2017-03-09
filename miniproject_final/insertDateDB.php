 <?php
  session_start();



// Create connection
$conn = new mysqli("localhost", "root", "", "sportilife");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$in_date = $_POST["date"];

 


   $query="INSERT INTO `delivery`(`deliveryID`, `deliveryDate`, `deliveryCount`) 
   VALUES ('','$in_date','1')";
   //$result = $conn->query($query);

  
   
if ($conn->query($query) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}










 
header( "Refresh:5; url=config.php");


mysqli_close($conn);



  ?>