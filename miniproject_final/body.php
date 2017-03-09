<?php
	echo '<table width="770" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                                  <td align="center" valign="middle"><a href="product.php"><img src="<?php echo $_SESSION["prodDetail"][0][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr>
                                  <td height="50" align="left" valign="top"><strong><a href="product.php"><?php echo $_SESSION["prodDetail"][0][0] ?></a></strong>
                                    <br><?php echo "HK$".$_SESSION["prodDetail"][0][1] ?> </td>
                                </tr>
                              </table></td>
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="#"><img src="<?php echo $_SESSION["prodDetail"][1][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><p><strong><?php echo $_SESSION["prodDetail"][1][0] ?></strong><br>
                                      <?php echo "HK$".$_SESSION["prodDetail"][1][1] ?> </p>
                                    </td>
                                </tr>
                              </table></td>
                            <td  width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="#"><img src="<?php echo $_SESSION["prodDetail"][2][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><?php echo $_SESSION["prodDetail"][2][0] ?></strong><br>
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
                                  <td align="center" valign="middle"><a href="#"><img src="<?php echo $_SESSION["prodDetail"][3][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><?php echo $_SESSION["prodDetail"][3][0] ?></strong> <br>
                                    <?php echo "HK$".$_SESSION["prodDetail"][3][1] ?> </td>
                                </tr>
                              </table></td>
                            <td style="border-right:1px solid #DCDCDC" width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="#"><img src="<?php echo $_SESSION["prodDetail"][4][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><?php echo $_SESSION["prodDetail"][4][0] ?></strong><br>
                                    <?php echo "HK$".$_SESSION["prodDetail"][4][1] ?> </td>
                                </tr>
                              </table></td>
                            <td width="33%" height="175"><table width="90%" height="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td align="center" valign="middle"><a href="#"><img src="<?php echo $_SESSION["prodDetail"][5][2] ?>" width="100" height="100" border="0"></a></td>
                                </tr>
                                <tr> 
                                  <td height="50" align="left" valign="top"><strong><?php echo $_SESSION["prodDetail"][5][0] ?></strong><br>
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
';

?>