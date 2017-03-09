<?php
	echo '
        <tr>
          <td height="75" align="center" valign="middle"><table width="720" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="475" height="30" align="left" valign="middle" class="caption"><a href="home.php">Sportilife
                  <font color="9F1E30">SHOP</font></a></td>
              </tr>';

	if(((isset($_SESSION["username"])) && (isset($_SESSION["password"])))){
		//echo "";
		echo "<tr><td>Wellcome, ".$_SESSION["username"]."!</td></tr>";
	}else{
		echo "<tr><td>Wellcome, Guest!</td></tr>";
	}  
			  
    echo '</table></td>
        </tr>
        <tr>
          <td height="32" align="center" valign="middle" background="images/menubar.gif"><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
                <td width="60" height="25"><a href="home.php?cat1=Men" class="footermenu">men</a></td>
                <td width="70" height="25"><a href="home.php?cat1=Women" class="footermenu">women</a></td>
                <td width="80" height="25"><a href="home.php?cat1=Children" class="footermenu">children</a></td>
                <td width="110" height="25"><a href="shopping_cart.php" class="footermenu">shopping cart</a></td>
                <td width="95" height="25"><a href="profile.php" class="footermenu">my account</a></td>
                <td width="95" height="25"><a href="myaccount.php" class="footermenu">login/out</a></td>
              </tr>
            </table></td>
        </tr>
	';

?>