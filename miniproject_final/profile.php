

<html>
<head> <title>User Profile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
<style>
    
h1{font-family: Arial, Helvetica, sans-serif;}
table {
margin: 15px;
}
table, td, th {
    border: 1px solid #ddd;
    text-align: left;
font-family: Arial, Helvetica, sans-serif;
font-size:15;
}
table {
    border-collapse: collapse;
    width: 75%;
}

td,th {
    padding: 15px;
color: grey;
}


 input[type=submit] {
    width: 20%;
    background-color:  #F08080;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: grey;
}


  .red {color: red; font-style: italic;}
.text{font-size: 20px;}
.error {color:#F08080;
font-family: Arial, Helvetica, sans-serif;}

</style>
<script >

</script>
</head>

   
    
  

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
                <td width="475" height="30" align="left" valign="middle" class="caption"><a href="home.php">Sportilife
                  <font color="9F1E30">SHOP</a></font></td>
              </tr>
            </table></td>
            </tr>

            <tr>
              <td height="32" align="center" valign="middle" background=""><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
                 
<?php
   session_start();
   if((isset($_SESSION["username"])) && (isset($_SESSION["password"])))

{
$un = $_SESSION["username"];

     print("<h1>Personal Information</h1>");
   
  $conn = mysqli_connect("localhost", "root", "","sportilife");
   if ($conn->connect_error)  {
	echo "Unable to connect to database";
   	exit;
   }
     // $un = $_POST["username"];
   $query = "SELECT *
           FROM customer, login, address
           WHERE login.UserName = \"".$un."\"
           AND customer.CustomerID = login.CustomerID
           AND address.CustomerID = login.CustomerID";
   
   
   $result = $conn->query($query);
if (!$result)  die ("");
   else {
	$result->data_seek(0);
	
	while ($row = $result->fetch_assoc())  {

            print("<th>User Profile</th>");
        // $username = "'".$_row['username']."'";
 $email = $row['EmailAddress'];
 $balance =  $row['Balances'];
 $id = $row['CustomerID'];
 $fname = $row['FirstName'];
 $lname = $row['LastName'];

$uname = $row['UserName'];
$gender = $row['Gender'];
 $room = $row['Room']; 
$building = $row['Building'];
$street = $row['Street'];
$city = $row['City'];
$region =$row['Region'];
$country =$row['Country'];


                        
print("<br>");
print("   &nbsp; Welcome, $fname!");
print("<table>");
      
                        print("<tr>");
       print("<td>First Name: </td>");
       print("<td>".$fname."</td>");
                        print("</tr>");
   print("<tr>");
       print("<td>Last Name: </td>");
       print("<td>".$lname."</td>");
                        print("</tr>");
                       
                        print("<tr>");
       print("<td>Gender: </td>");
       print("<td>".$gender."</td>");
                        print("</tr>");
                       
                        
   print("<tr>");
       print("<td>Email Address: </td>");
       print("<td>".$email."</td>");
                        print("</tr>");

      
                        
                         print("<tr>");
       print("<td>Username: </td>");
       print("<td>".$uname."</td>");
                        print("</tr>");
                        print("<tr>");
                        print("<tr>");
       print("<td>Balance: </td>");
       print("<td>$".$balance."<br>
	   <form method='POST' action='addValue.php'>
			Input your gift card code: <input type='text' name='uuid'>
			<input type='submit' value='submit' required>
	   </form>
	   </td>");
                        print("</tr>");
                          
    print("<tr>");
print("<td>Address: </td>");
print("<td><ul>");
print("<li>Room ".$room."," .$building."</li>");
print("<li>".$street."</li>");
print("<li>".$region."</li>");
print("<li>".$city."</li>");
print("<li>".$country."</li>");
print("</ul></td>");
 print("</tr>");
 print("</table>");
   
        }}
     $result->free();
$conn->close();}
else

{

header('Location: Login.php');

}
            ?>
              <form name="profile" method="POST" action="UpdateProfile.php">
      <input type="submit" value="Edit Profile" name="update"/> 
   </form>
  </tr>      </table></td>
            </tr>
</body></html>
