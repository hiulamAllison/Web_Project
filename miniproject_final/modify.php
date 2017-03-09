<?php
	session_start();
?>
<html>
<head>
</head>
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
<div>
	<?php
		$i = 0;
		$match = false;
		$error = false;
		while($i < $_SESSION["total"]) {
			if($_GET["itemNo"] == $i){
				if($_GET["newQuantity"] >= 0 && $_GET["newQuantity"] < $_SESSION["cart"][$i][2]) {
					$_SESSION["cart"][$i][2] = $_GET["newQuantity"];
					echo "Change is made";
					$match = true;
				}
				else if($_GET["newQuantity"] >= $_SESSION["cart"][$i][2]) {
					$error = true;
				}
			}
			$i++;
		}
		if($error == true){
			echo "Qunatity your entered equals or is bigger than the original quantity.";
		}
		else if($match == false) {
			echo "No match item is found";
		}
		
		header("Refresh:3; url=shopping_cart.php");
	?>
</div>
</body>
</html>