<?php
	//session_start();
	//session_destroy();
	session_start();
	$_SESSION["prodDetail"] = array();
?>
<html>
<head>
<title>Home page of Sportilife</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
<?php
	function Dispaly($no, $cat){
		$conn = mysqli_connect("localhost", "root", "","sportilife");
		if ($conn->connect_error)  {
			echo "Unable to connect to database";
			exit;
		}

		//username variable && password variable not set
		if($no == 0 && $cat == NULL){
			$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` ORDER BY `inventory`.`ProductName` ASC";
		}else if($no == 1){
			$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` WHERE `inventory`.`Category1` = '".$cat."' ORDER BY `inventory`.`ProductName` ASC";
		}else if($no == 2){
			$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` WHERE `inventory`.`Category2` = '".$cat."' ORDER BY `inventory`.`ProductName` ASC";
		}else if($no == 3){
			$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` WHERE `inventory`.`Brand` = '".$cat."' ORDER BY `inventory`.`ProductName` ASC";
		}
		
		//$query = "SELECT DISTINCT `inventory`.`ProductName`, `inventory`.`SellPrice`, `productimg`.`Img` FROM `inventory` INNER JOIN `productimg` ON `inventory`.`ProductName` = `productimg`.`ProductName` WHERE `inventory`.`Category1` = 'Women' and `inventory`.`Category2` = 'Shoes' ORDER BY `inventory`.`ProductName` ASC";
		
		$result = $conn->query($query);
		$result->data_seek(0);
	
		$page = 1;
		$pcount = 0;
		while($row = $result->fetch_assoc()){
			if($pcount == 6){
				$pcount = 0;
				break;								
			}
			$_SESSION["prodDetail"][$pcount][0] = $row["ProductName"];
			$_SESSION["prodDetail"][$pcount][1] = $row["SellPrice"];
			$_SESSION["prodDetail"][$pcount][2] = $row["Img"];
			$pcount++;
		}
	
		$result->free();
		$conn->close();
	}
	
?>
</head>

<body background="images/pgbg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="770" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><table width="755" height="100%" border="0" cellpadding="0" cellspacing="0">
		<!-------------------------------------------------------------------------------------------------------------------------------------------------->
		<?php
			require("header.php");
		?>
		<!-------------------------------------------------------------------------------------------------------------------------------------------------->
        <tr>
          <td align="left" valign="top"><table width="755" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr align="center" valign="top">
			  <!-------------------------------------------------------------------------------------------------------------------------------------------->
				<?php
					require("sidebar.php");
				?>
			<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------->				<?php	
						
						if(isset($_GET["cat1"])){
							$abc = $_GET["cat1"];
							Dispaly(1, $abc);
						}else if(isset($_GET["cat2"])){
							$abc = $_GET["cat2"];
							Dispaly(2, $abc);
						}else if(isset($_GET["brand"])){
							$abc = $_GET["brand"];
							Dispaly(3, $abc);
						}else{
							Dispaly(0, NULL);
						}
					?>
                <td width="390"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="20" align="left" valign="top">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="31" align="left" valign="middle" background="images/greenbar.gif" style="background-repeat:no-repeat" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="footermenu"><strong><font color="#FFFFFF">Product</font></strong></span></td>
                    </tr>					
                    <tr> 
                      <td height="20">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr align="center" valign="top">
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][0][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][0][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr>
                                  <td height="50" align="left" valign="top"><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][0][0] ?>"><?php echo $_SESSION["prodDetail"][0][0] ?></a></strong>
                                    <br><?php echo "HK$".$_SESSION["prodDetail"][0][1] ?> </td>
                                </tr>
                              </table></td>
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][1][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][1][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><p><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][1][0] ?>"><?php echo $_SESSION["prodDetail"][1][0] ?></strong></a><br>
                                      <?php echo "HK$".$_SESSION["prodDetail"][1][1] ?> </p>
                                    </td>
                                </tr>
                              </table></td>
                            <td  width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][2][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][2][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][2][0] ?>"><?php echo $_SESSION["prodDetail"][2][0] ?></strong></a><br>
									<?php echo "HK$".$_SESSION["prodDetail"][2][1] ?> </td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr>
                            <td width="33%" height="22">&nbsp;</td>
                            <td width="33%" height="22">&nbsp;</td>
                            <td width="33%" height="22">&nbsp;</td>
                          </tr>
                          <tr align="center" valign="top">
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][3][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][3][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][3][0] ?>"><?php echo $_SESSION["prodDetail"][3][0] ?></strong></a><br>
                                    <?php echo "HK$".$_SESSION["prodDetail"][3][1] ?> </td>
                                </tr>
                              </table></td>
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][4][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][4][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][4][0] ?>"><?php echo $_SESSION["prodDetail"][4][0] ?></strong></a><br>
                                    <?php echo "HK$".$_SESSION["prodDetail"][4][1] ?> </td>
                                </tr>
                              </table></td>
                            <td width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][5][0] ?>"><img src="<?php echo $_SESSION["prodDetail"][5][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><a href="<?php echo "product.php?pName=".$_SESSION["prodDetail"][5][0] ?>"><?php echo $_SESSION["prodDetail"][5][0] ?></strong></a><br>
                                    <?php echo "HK$".$_SESSION["prodDetail"][5][1] ?> </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                
				
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------->
				<td width="6">&nbsp;</td>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------->	
				<?php
					require("brand.php");
				?>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------->	
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
