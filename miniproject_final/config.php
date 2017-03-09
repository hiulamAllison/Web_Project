<html>
    <head>
        <title>Confirmation Page</title>
        <Link href="style.css" type="text/css" rel="stylesheet">
    
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
              <br>
                <td width="475" height="30" align="left" valign="middle" class="caption"><a href="home.php">Sportilife
                    <font color="9F1E30">SHOP</font></td></a>
              </tr>
              </table>
              <br><b><h1>Confirmation Page</h1></b>



<br>
<?php


$conn = mysqli_connect("localhost", "root", "","sportilife");
   if ($conn->connect_error)  {
	echo "Unable to connect to database";
   	exit;
   }
$query = "SELECT delivery.DeliveryID,`DeliveryDate`,orders.OrdersID FROM `delivery`, orders WHERE delivery.DeliveryID=orders.DeliveryID ORDER BY delivery.DeliveryID DESC";

$result = $conn->query($query);
$row = $result->fetch_assoc();
if (!$result)  die ("");
   else {


       while ($row = $result->fetch_assoc()){
  print("<ul>");
 print("DeliveryID: ".$row["DeliveryID"]."<br>"."Delivery Date: ". $row["DeliveryDate"]."<br>"."OrderID: ".$row["OrdersID"].""); print("</ul>");
         }        
     } 
   

mysqli_free_result($result);
   mysqli_close($conn);
   ?>
   </body>
</html>