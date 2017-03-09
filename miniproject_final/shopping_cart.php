<?php
	session_start();
	if(!isset($_SESSION["cart"])) {
		$_SESSION["cart"] = array();
	}
	if(!isset($_SESSION["total"])){
		$_SESSION["total"] = 0;
	}
	//if(!$_SESSION["loginStatus"]){}
	if(!((isset($_SESSION["username"])) && (isset($_SESSION["password"])))){
		//echo "";
		header('Location: Login.php');
	}
?>
<html>
<head>
<title>Sportilife - shoes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet" />
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

<body background="images/pgbg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="displayShoppingCartItems()">
<table width="770" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="755" border="0" cellpadding="0" cellspacing="0">
	
<td width="475" height="30" align="left" valign="middle" class="caption"><a href="home.php">Sportilife
                  <font color="9F1E30">SHOP</font></a></td>
		
	<tr>
</table>
<div style="font-size: 13px;">
			<p>You have added the following items to your shopping cart:</p>
			<?php
				$conn = mysqli_connect("localhost", "root", "","sportilife");
				if ($conn->connect_error)  {
					echo "Unable to connect to database";
					exit;
				}
				
				echo "<table id='cart'><tr><td>Item #</td><td>Product Name</td><td>Size</td><td>Quantity</td></tr>";
				$i = 0;
				$_SESSION["totalCost"] = 0;
				while($i < $_SESSION["total"]) {
					if($_SESSION["cart"][$i][2] != 0){
						echo "<tr><td>".$i."</td><td>".$_SESSION["cart"][$i][0]."</td><td>".$_SESSION["cart"][$i][1]."</td><td>".$_SESSION["cart"][$i][2]."</td></tr>";
						
						$query = "SELECT SellPrice FROM inventory WHERE ProductName = '".$_SESSION["cart"][$i][0]."'";
						$result = $conn->query($query);
						$row = $result->fetch_assoc();
						$sellPrice = $row["SellPrice"];
						$_SESSION["totalCost"] += $sellPrice*$_SESSION["cart"][$i][2];
					}
					$i++;
				}
				echo "</table>";
			?>
			<p>The total cost is $<?php echo $_SESSION["totalCost"]; ?></p>
			<!-- if customer wants to make changes, direct to modify.php-->
			<form method="GET" action="modify.php">
				If you want to reduce the amount of some items in your shopping cart, please input the item number and how many you want.<br>
				Item number: <input type="text" name="itemNo" required><br>
				New Quantity: <input type="text" name="newQuantity" required><br>
				<input type="submit" value="Enter">
			</form>
			<!-- if customer wants to pay, direct to payment.php-->
			<p>If you have finished shopping, please click the below button to pay.</p>
			<form action="home.php" onsubmit="window.open('payment.php','_blank','scrollbars=no,menubar=no,resizable=yes,toolbar=no,status=no');return true;">
				<input type="submit" value="Pay">
			</form>
		</div>
</body>
</html>
