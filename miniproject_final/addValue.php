<?php
	session_start();
?>
<html>
<head>    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
		$conn = mysqli_connect("localhost", "root", "","sportilife");
		if ($conn->connect_error)  {
			echo "Unable to connect to database";
			exit;
		}
		
		$uuid = $_POST["uuid"];
		//username variable && password variable not set
		$query = "SELECT status, cost FROM uuid WHERE uuid = '".$uuid."'";
		$result = $conn->query($query);
		$result->data_seek(0);
		$row = $result->fetch_assoc();
		$status = $row["status"];
		$cost = $row["cost"];
		
		if($status == "NotUse"){
			$query = "SELECT customerID FROM login WHERE username = '".$_SESSION["username"]."'";
			$result = $conn->query($query);
			$result->data_seek(0);
			$row = $result->fetch_assoc();
			$customerID = $row["customerID"];
			
			$query = "SELECT balances FROM customer WHERE customerID = '".$customerID."'";
			$result = $conn->query($query);
			$result->data_seek(0);
			$row = $result->fetch_assoc();
			$balance = $row["balances"];
			
			$query = "UPDATE customer SET balances = '".($balance + $cost)."' WHERE customerID = '".$customerID."'";
			$conn->query($query);
			
			$query = "UPDATE uuid SET status = 'Use' WHERE uuid = '".$uuid."'";
			$conn->query($query);
			
			echo "Your gift card code is valid. Value is added to your account.";
		}
		else {
			echo "Your gift card code is either used already or invalid giftcard code is entered. Please check.";
		}
		
		header("Refresh:3; url=profile.php");
		
		$result->free();
		$conn->close();
	?>
	
  </tr>      </table></td>
            </tr>
</body>
</html>