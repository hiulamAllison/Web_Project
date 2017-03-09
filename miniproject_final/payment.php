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

		//username variable && password variable not set
		$query = "select CustomerID from login WHERE UserName = '".$_SESSION["username"]."'";
		$result = $conn->query($query);
		$result->data_seek(0);
		$row = $result->fetch_assoc();
		$_SESSION["customerID"] = $row["CustomerID"];
		
		//
		$query = "select FirstName, Balances FROM customer WHERE CustomerID = '".$row["CustomerID"]."'";
		$result = $conn->query($query);
		$result->data_seek(0);
		
		$row = $result->fetch_assoc();
		$_SESSION["firstName"] = $row["FirstName"];
		$_SESSION["balance"] = $row["Balances"];
		
		echo "<p>Dear ".$row["FirstName"].",</p>";
		echo "The balance in your account is: ".$row["Balances"]." <br>";
		
		if($_SESSION["balance"] > $_SESSION["totalCost"] && $_SESSION["totalCost"] != 0) {
			echo "A total of $".$_SESSION["totalCost"]." will be deducted from your account for this order.";
			header( "Refresh:2; url=confirmPayment.php");
		}
		else if($_SESSION["totalCost"] == 0) {
			echo "No item is found in shopping cart. Go find some product you like.<br>";
			unset($_SESSION["cart"]);
			$_SESSION["total"] = 0;
			echo "<input type='button' value='Close' onclick='window.close()'>";
		}
		else {
			echo "You do not have enough balance in your account. Please deposit money to your account.";
			echo "<input type='button' value='Close' onclick='window.close()'>";
		}
		
		$result->free();
		$conn->close();
	?>
</body>
</html>