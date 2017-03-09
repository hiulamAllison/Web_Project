<?php
session_start();?>
<html>
    <head><title>Update Profile Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
    <style>
       

  .red {color: red; font-style: italic;}
.text{font-size: 20px;}
.error {color:#F08080;
font-family: Arial, Helvetica, sans-serif;}

input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #F08080;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


input[type=submit]:hover {
    background-color: lightgrey;
}</style>
             <script type="text/javascript">
   function check(f)  {



 var namepatt = /^[a-zA-Z ]*$/;
 
 var ppatt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
 
 var emailpatt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

var rpatt = /^[a-zA-Z0-9 ]*$/;

 if (fname.value == ""){
     infofname.innerHTML= "This field is required"; 
    return false;
}
  else if (namepatt.test(fname.value) == false )	{
 	infofname.innerHTML="Only letters and white space allowed";
        return false;} 
else  { infofname.innerHTML="";}



 if (lname.value == ""){
    infolname.innerHTML= "This field is required"; 
    return false;
 }
  else if (namepatt.test(lname.value) == false )	{
 	infolname.innerHTML="Only letters and white space allowed";
        return false;} 
else  { infolname.innerHTML="";}




 if (password.value == ""){
    infopwd.innerHTML= "This field is required"; 
    return false;
 }
  else if (ppatt.test(password.value) == false )	{
 	infopwd.innerHTML="Must contain at least one number and one uppercase and lowercase letter, and at least 6 but less than 20 characters";
        return false;} 
else  { infopwd.innerHTML="";}


 if (cpassword.value == ""){
    infocpwd.innerHTML= "This field is required"; 
    return false;
 }
  else if (cpassword.value != password.value )	{
 	infocpwd.innerHTML="Must equal to password";
        return false;} 
else  { infocpwd.innerHTML="";}



if (email.value == ""){
    infoemail.innerHTML= "This field is required"; 
    return false;
 }
  else if (emailpatt.test(email.value) == false )	{
 	infoemail.innerHTML="Invalid email format";
        return false;} 
else  { infoemail.innerHTML="";}




if (room.value == ""){
    inforoom.innerHTML= "This field is required"; 
    return false;
 }
  else if (rpatt.test(room.value) == false )	{
 	inforoom.innerHTML="Only letters and numbers allowed";
        return false;} 
else  { inforoom.innerHTML="";}



if (building.value == ""){
    infobd.innerHTML= "This field is required"; 
    return false;
 }
  else if (rpatt.test(building.value) == false )	{
 	infobd.innerHTML="Only letters, white space and numbers allowed";
        return false;} 
else  { infobd.innerHTML="";}


if (street.value == ""){
    infost.innerHTML= "This field is required"; 
    return false;
 }
  else if (rpatt.test(street.value) == false )	{
 	infost.innerHTML="Only letters, white space and numbers allowed";
        return false;} 
else  { infost.innerHTML="";}

if (region.value == ""){
    inforg.innerHTML= "This field is required"; 
    return false;
 }
  else if (rpatt.test(region.value) == false )	{
 	inforg.innerHTML="Only letters, white space and numbers allowed";
        return false;} 
else  { inforg.innerHTML="";}





if (city.value == ""){
    infoct.innerHTML= "This field is required"; 
    return false;
 }
  else if (namepatt.test(city.value) == false )	{
 	infoct.innerHTML="Only letters and white space allowed";
        return false;} 
else  { infoct.innerHTML="";}


if (country.value == ""){
    infocty.innerHTML= "This field is required"; 
    return false;
 }
  else if (namepatt.test(country.value) == false )	{
 	infocty.innerHTML="Only letters and white space allowed";
        return false;} 
else  { infocty.innerHTML="";}



}


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
            


            <tr>
              <td height="32" align="center" valign="middle" background=""><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
                  <?php

$un = $_SESSION["username"];
$pass=$_SESSION["password"];
   print("<h1>Personal Infomation</h1>");
   
  $conn = mysqli_connect("localhost", "root", "","sportilife");
   if ($conn->connect_error)  {
	echo "Unable to connect to database";
   	exit;
   }
  $query = "SELECT EmailAddress,login.CustomerID, Balances,FirstName, LastName,UserName, Gender, Building, Room, Street, City, Region, Country, Password
           FROM customer, login, address
           WHERE login.CustomerID = customer.CustomerID
               AND address.CustomerID = customer.CustomerID
               AND login.UserName = \"".$un."\"";

   $result = $conn->query($query);
if (!$result)  die ("");
   else {
	$result->data_seek(0);
	
	while ($row = $result->fetch_assoc())  {
  {
     $email = $row['EmailAddress'];

 //$id = $row['CustomerID'];
 $fname = $row['FirstName'];
 $lname = $row['LastName'];
  $p = $row['Password'];
$uname = $row['UserName'];
$gender = $row['Gender'];
$room = $row['Room']; 
$building = $row['Building'];
$street = $row['Street'];
$city = $row['City'];
$region =$row['Region'];
$country =$row['Country'];
   }}}

$result->free();
$conn->close();
  
  
    ?>
     

        
              <br><br>
<form method="POST" action="userDB.php">
  First Name: <input type="text" name="fname" id="fname" value="<?php echo $fname;?>">
  <br><span class="error" id="infofname" name="infofname"></span>
  <br><br>
  Last Name: <input type="text" name="lname" id="lname" value="<?php echo $lname;?>">
  <br><span class="error"id="infolname" name="infolname"></span>
  <br><br>
 Gender: <input name="sex" type="radio" id="sex" value="M" <?php if ($gender == "M"){ echo 'checked';} ?>   /> Male
          <input name="sex" type="radio" id="sex" value="F" <?php if ($gender== "F"){ echo 'checked';} ?>/> Female
                   
  <br><br>
  E-mail: <input type="text" name="email" id="email" value="<?php echo $email;?>">
  <br> <span class="error" id="infoemail" name="infoemail"></span>
  <br><br>
  Password: <input type="password" name="password" id="password" value="<?php echo $p;?>">
  <br> <span class="error"id="infopwd" name="infopwd"></span>
  <br><br>
   Confirm Password: <input type="password" name="cpassword" id="cpassword" value="<?php echo $p;?>">
  <br><span class="error"id="infocpwd" name="infocpwd"></span>
  <br><br>
 
  
   Room: <input type="text" name="room" id="room"value="<?php echo $room;?>">
  <br><span class="error"id="inforoom" name="inforoom"></span>
  <br><br>
  
   Building: <input type="text" name="building" id="building"value="<?php echo $building ;?>">
  <br><span class="error"id="infobd" name="infobd"></span>
  <br><br>
  
  Street: <input type="text" name="street" id="street" value="<?php echo $street ;?>">
  <br><span class="error"id="infost" name="infost"></span>
  <br><br>
  
  Region: <input type="text" name="region" id="region" value="<?php echo $region ;?>">
  <br><span class="error"id="inforg" name="inforg"></span>
  <br><br>
  
  City: <input type="text" name="city"id="city" value="<?php echo $city ;?>">
  <br><span class="error"id="infoct" name="infoct"></span>
  <br><br>
  
  Country: <input type="text" name="country"id="country" value="<?php echo $country ;?>">
  <br><span class="error"id="infocty" name="infocty"></span>
  <br><br>
  
  <input type="submit" name="edit" value="Submit" onclick="return check(this.value)">  
</form>
  </tr>      </table></td>
            </tr>
    </body>
 </html>                        