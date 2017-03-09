<?php
	session_start();
	if(!isset($_SESSION["prodDetail"])){
		$_SESSION["prodDetail"] = array();
	}
	$prodctName = $_GET["pName"];
?>
<html>
<head>
<title>Sportilife - <?php echo $prodctName; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
</head>

<body background="images/pgbg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="770" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="755" height="100%" border="0" cellpadding="0" cellspacing="0">
	
	
				<?php
					require("header.php");
				?>
		
		
		
        <tr>
          <td align="left" valign="top"><table width="755" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr align="center" valign="top">
			  
			  
			  
				<?php
					require("sidebar.php");
				?>
				
<!------------------------------------------------------------------------------------------------------------------------------------------->				
                <td width="390"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
				<?php
				"<tr>".
				"<td>".
				"<form method='post' action=''>";?>

				<?php
					$conn = mysqli_connect("localhost", "root", "","sportilife");
					if ($conn->connect_error) {
						echo "Unable to connect to database";
						exit;
					}
					$prodctName = $_GET["pName"];
					$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`Description`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` WHERE `inventory`.`ProductName` = '".$prodctName."'";
					
					$result = $conn->query($query);
					$result->data_seek(0);
					
					$row = $result->fetch_assoc();
					$_SESSION["prodDetail"][0][0] = $row["ProductName"];
					$_SESSION["prodDetail"][0][1] = $row["SellPrice"];
					$_SESSION["prodDetail"][0][2] = $row["Img"];
					$_SESSION["prodDetail"][0][3] = $row["Description"];
					
					//echo $prodctName;
					
					echo"<img src='".$_SESSION["prodDetail"][0][2]."' width='310' height='310' />";
					echo"<h2>".$_SESSION["prodDetail"][0][0]."</h1>";
					echo"<h5>HK$".$_SESSION["prodDetail"][0][1]."</h5>";
					echo"<p>".$_SESSION["prodDetail"][0][3]."<p>";
					
					
					echo '<form method="GET" action="added.php">';
					echo "<p>Size(US): ";
					echo"<select name = 'size'>";
					$query = "SELECT `inventory`.`Size` FROM `inventory` WHERE `ProductName` = '".$_SESSION["prodDetail"][0][0]."'";
					$result = $conn->query($query);
					$result->data_seek(0);
					
					while ($row = $result->fetch_assoc())  {
						echo "<option value='" . $row["Size"]  . "'>" . $row["Size"] . "</option>";
					}
					echo "</select></p>";
					
					echo "<p>Quantity: ";
					echo"<select name = 'quantity'>";
					
					$query = "SELECT `inventory`.`Quantity` FROM `inventory` WHERE `ProductName` = '".$_SESSION["prodDetail"][0][0]."'";
					$result = $conn->query($query);
					$result->data_seek(0);
					
					$row = $result->fetch_assoc();
					$qty = $row["Quantity"];
					for($i = 1; $i <= $qty; $i++){
						echo "<option value='" . $i  . "'>" . $i . "</option>";
					}
					
					echo "</select></p>";
					
					/*
					echo "<option value='1'>1</option>".
						  "<option value='2'>2</option>".
						  "<option value='3'>3</option>".
						  "<option value='4'>4</option>".
						  "<option value='5'>5</option>".
						"</select></p>";
						*/
					echo"<input type='submit' value='CHECKOUT' style='background: orange; color: white;'>".
						"</form>".
						"</td>".
						"</tr>";
					
					echo '</from>';
					$result->free();
					$conn->close();
				?>
                  </table></td>
                <td width="6">&nbsp;</td>
				
				<?php
					require("brand.php");
				?>
				
				
                
				  
				  
				  
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>
