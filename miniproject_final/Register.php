<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <Link href="style.css" type="text/css" rel="stylesheet">
       <script type="text/javascript">
   function check(f)  {



 var namepatt = /^[a-zA-Z ]*$/;
 
 var ppatt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
 
 var emailpatt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;



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

if (email.value == ""){
    eemail.innerHTML= "This field is required"; 
    return false;
 }
  else if (emailpatt.test(email.value) == false )	{
 	eemail.innerHTML="Invalid email format";
        return false;} 
else  { eemail.innerHTML="";}




if (Uname.value == ""){
     infouname.innerHTML= "This field is required"; 
    return false;
}
  else if (namepatt.test(Uname.value) == false )	{
 	infouname.innerHTML="Only letters and white space allowed";
        return false;} 
else  { infouname.innerHTML="";}




 if (pwd.value == ""){
    infopwd.innerHTML= "This field is required"; 
    return false;
 }
  else if (ppatt.test(pwd.value) == false )	{
 	infopwd.innerHTML="Must contain at least one number and one uppercase and lowercase letter, and at least 6 but less than 20 characters";
        return false;} 
else  { infopwd.innerHTML="";}




   }

</script>
    
<style>

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
    background-color: lightblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


input[type=submit]:hover {
    background-color: lightgrey;
}
.error {color:#F08080;
font-family: Arial, Helvetica, sans-serif;}

</style>
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
<b><h1>Register Form</h1></b>
<br></br>
  <form name="new" action="InsertDB.php" method="POST">
   
 
   
<br></br>

    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="fname" required>
    <br><span class="error" id="infofname" name="infofname"></span>
<br>
    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lname" required>
    <br><span class="error"id="infolname" name="infolname"></span>
<br>
     <label for="gender">Gender</label><br>
      <select id="gender" name="gender">
      <option value="Male">M</option>
      <option value="Female">F</option>
   
 
    </select><br>
<br>
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" >
    <br><span class="error" id="eemail" name="eemail"></span>

<br>
    <label for="Uname">Username</label><br>
    <input type="text" id="Uname" name="Uname" required>
    <br><span class="error"id="infouname" name="infouname"></span>
<br>
     <label for="pwd">Password</label><br>
    <input type="password" id="pwd" name="pwd" required>
    <br><span class="error"id="infopwd" name="infopwd"></span>

   
  <br></br>
  <input type="submit" value="submit" name="submit" onclick="return check(this.value)">
  </form>
  
 </tr>
            </table></td>
            </tr>

</body>
</html>