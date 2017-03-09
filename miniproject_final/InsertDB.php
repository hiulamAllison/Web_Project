 <?php
  session_start();



// Create connection
$conn = new mysqli("localhost", "root", "", "sportilife");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


   
  /* $gender=$_POST["gender"];
   $fname=$_POST["fname"];
   $lname=$_POST["lname"];
   $email=$_POST["email"];
   $balance=$_POST["balance"];
   $Uname=$_POST["Uname"];
   $pwd=$_POST["pwd"];*/
   



   if (!null==(filter_input(INPUT_POST, 'submit'))) {
 $gender = filter_input(INPUT_POST, 'gender');
 $fname = filter_input(INPUT_POST, 'fname');
 $lname= filter_input(INPUT_POST, 'lname');
 $email =filter_input(INPUT_POST, 'email');
 
 $Uname = filter_input(INPUT_POST, 'Uname');
 $pwd = filter_input(INPUT_POST, 'pwd');


// need to check data is vaild or not before send a insert query
   $query="INSERT INTO `customer`(`CustomerID`, `Gender`, `FirstName`, `LastName`, `EmailAddress`, `Balances`) 
   VALUES ('','$gender','$fname','$lname','$email','')";
   $result = $conn->query($query);

  
   
if ($conn->query($query) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}






 
$query2= "INSERT INTO `login`(`UserName`, `CustomerID`, `Password`) VALUES ('$Uname','$last_id','$pwd')";
 if ($conn->query($query2) === TRUE) {
     
     header("Location:home.php");
     
 }else {
    echo "Error in registration!";
}








} 



mysqli_close($conn);



  ?>