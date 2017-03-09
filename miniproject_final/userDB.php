<?php
session_start();?>
 <body background="images/pgbg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="770" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="755" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="75" align="center" valign="middle"><table width="720" border="0" cellspacing="0" cellpadding="0">
              <tr> 
              
   <td width="475" height="30" align="left" valign="middle" class="caption"><a href="homepage.html">Sportilife
                  <font color="9F1E30">SHOP</a></font></td>
              </tr>
            


            <tr>
              <td height="32" align="center" valign="middle" background=""><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
<?php
$un = $_SESSION["username"];
$pass = $_SESSION["password"];
// Create connection
$conn = mysqli_connect("localhost", "root", "", "sportilife");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if (filter_input(INPUT_POST,"edit") ) {
$em = filter_input(INPUT_POST, 'email');
 $pwd = filter_input(INPUT_POST, 'password');
 //$cid = filter_input(INPUT_POST, 'CustomerID');
 $fn =filter_input(INPUT_POST, 'fname');
 $ln = filter_input(INPUT_POST, 'lname');
$gen =filter_input(INPUT_POST, 'sex');
$rm = filter_input(INPUT_POST, 'room'); 
$bd = filter_input(INPUT_POST, 'building');
$st = filter_input(INPUT_POST, 'street');
$ct = filter_input(INPUT_POST, 'city');
$rg =filter_input(INPUT_POST, 'region');
$cty =filter_input(INPUT_POST, 'country');
 

    $sql="UPDATE customer,address,login
SET
  customer.FirstName = '$fn', customer.LastName = '$ln', customer.EmailAddress = '$em',  customer.Gender = '$gen', 
      login.Password = '$pwd',
  
  address.Room = '$rm', address.Building = '$bd', address.Street = '$st', address.City = '$ct', address.Region = '$rg',
      address.Country = '$cty'
WHERE login.UserName = \"".$un."\"
    AND customer.customerID = address.customerID
AND customer.customerID  = login.customerID";
    
   if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header( "refresh:2; url=profile.php" ); 
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();}


?>
     </table></td>
            </tr>
    </body>