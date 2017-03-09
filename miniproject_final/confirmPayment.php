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
		
		//update order to table orders
		$query = "INSERT INTO Orders (CustomerID, OrdersDate) VALUES ('".$_SESSION["customerID"]."', '".date("Y-m-d")."')";
		$conn->query($query);
		
		//get order id
		$query = "SELECT OrdersID FROM orders ORDER BY OrdersID DESC limit 1";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$orderID = $row["OrdersID"];
		
		echo "Dear ".$_SESSION["firstName"].",<br>";
		echo "Your order No is: ".$orderID."<br>";
		
		//--------------------------------------------------------------------------------------------------------------------------
		//init for display items added to shopping cart
		$i = 0;
		//display items added to shopping cart
		echo "<table><th>Product Name</th><th>Size</th><th>Quantity</th>";
		while ($i < $_SESSION["total"])  {
			//get productID
			$query = "SELECT ProductID FROM inventory WHERE ProductName = '".$_SESSION["cart"][$i][0]."' AND Size = '".$_SESSION["cart"][$i][1]."'";
			$result = $conn->query($query);
			$row = $result->fetch_assoc();
			$productID = $row["ProductID"];
			
			//update table orderedproduct
			if($_SESSION["cart"][$i][2] > 0) {
				$query = "INSERT INTO orderedproduct (OrderID, ProductID, Quantity) VALUES ('".$orderID."', '".$productID."', '".$_SESSION["cart"][$i][2]."')";
				$conn->query($query);
				echo "<tr><td>".$_SESSION["cart"][$i][0]."</td><td>".$_SESSION["cart"][$i][1]."</td><td>".$_SESSION["cart"][$i][2]."</td></tr>";
			
				//query quantity of product in inventory
				$query = "SELECT Quantity FROM inventory WHERE ProductID = '".$productID."'";
				$result = $conn->query($query);
				$row = $result->fetch_assoc();
				$originalQuantity = $row["Quantity"];
				
				//deduct number of products sold to customer in this order
				$query = "UPDATE inventory SET Quantity = '".($originalQuantity - $_SESSION["cart"][$i][2])."' WHERE ProductID = '".$productID."'";
				$conn->query($query);
			}
			
			$i++;
		}
		echo "</table>";
		
		$netBalance = $_SESSION["balance"] - $_SESSION["totalCost"];
		echo "The net balance is $".$netBalance."<br>";
		//update customer balance
		$query = "UPDATE customer SET Balances = '".$netBalance."' WHERE customerID = '".$_SESSION['customerID']."'";
		$conn->query($query);
		//---------------------------------------------------------------------------------------------------------------------------
		//order is placed, related variable should be reset
		unset($_SESSION["cart"]);
		//$_SESSION["cart"] = array();
		$_SESSION["total"] = 0;
		
		$result->free();
		$conn->close();
		//echo "<input type='button' value='Close' onclick='window.close()'>";
		header( "Refresh:5; url=delivery_address_1.php");

	?>
</body>
</html>