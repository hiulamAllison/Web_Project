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


p {font-size: 20px;}
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
<div>
			<p>You have added the following items to your shopping cart:</p>
			<?php
				echo "Product Name: ".$_SESSION["prodDetail"][0][0]."<br>";
				echo "Size: ".$_GET["size"]."<br>";
				echo "Quantity: ".$_GET["quantity"]."<br>";
				
				$conn = mysqli_connect("localhost", "root", "","sportilife");
				if ($conn->connect_error)  {
					echo "Unable to connect to database";
					exit;
				}
				
				//get quantity of product remaining in inventory
				$query = "SELECT Quantity FROM inventory WHERE ProductName = '".$_SESSION["prodDetail"][0][0]."' && Size = '".$_GET["size"]."'";
				$result = $conn->query($query);
				$row = $result->fetch_assoc();
				$quantity = $row["Quantity"];
				
				if($_GET["quantity"] > $quantity){
					echo "There is not enough stocks!";
				}
				else {
					$i = 0;
					$equal = false;
					while($i < $_SESSION["total"]) {
						if($_SESSION["prodDetail"][0][0] == $_SESSION["cart"][$i][0]){
							if($_GET["size"] == $_SESSION["cart"][$i][1]){
								$_SESSION["cart"][$i][2] = $_SESSION["cart"][$i][2] + $_GET["quantity"];
								$equal = true;
							}
						}
						$i++;
					}
					
					if($equal == false) {
						$_SESSION["cart"][$_SESSION["total"]][0] = $_SESSION["prodDetail"][0][0];
						$_SESSION["cart"][$_SESSION["total"]][1] = $_GET["size"];
						$_SESSION["cart"][$_SESSION["total"]][2] = $_GET["quantity"];
						$_SESSION["total"]++;
					}
				}
				header("Refresh:3; url=home.php");
			?>
</div>
</body>
</html>
