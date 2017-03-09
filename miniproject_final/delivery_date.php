<html>
<head> <title>User Profile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
<style>
    
h1{font-family: Arial, Helvetica, sans-serif;}
table {
margin: 10px;
}
table, td, th {
    border: 1px solid #ddd;
    text-align: left;
font-family: Arial, Helvetica, sans-serif;
font-size:15;
}
table {
    border-collapse: collapse;
    width: 70%;
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

<script type="text/javascript">
function vaildate(f){
	if ( document.forms["select_date"]["date"].value == "<?php echo $a[1] ?>" ) {
        document.getElementById("error").innerHTML="This date is not available!";
		return false; 
} else return false;
}
</script>
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
                <td width="475" height="30" align="left" valign="middle" class="caption">Sportilife
                  <font color="9F1E30">SHOP</font></td>
              </tr>
            </table></td>
            </tr>

            <tr>
              <td height="32" align="center" valign="middle" background=""><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
                 
<?php
   session_start();
   if((isset($_SESSION["username"])) && (isset($_SESSION["password"])))

{
$un = $_SESSION["username"];

     print("<p>The Quota of the following date if fulled.</p>");
   
  $conn = mysqli_connect("localhost", "root", "","sportilife");
   if ($conn->connect_error)  {
	echo "Unable to connect to database";
   	exit;
   }
     // $un = $_POST["username"];
   $query = "SELECT DeliveryCount,DeliveryDate FROM delivery WHERE DeliveryCount ='1' ";
   
   
   $result = $conn->query($query);
   $count =1;
if (!$result)  die ("");
   else {
	$result->data_seek(0);
	$j=0;
	while ($row = $result->fetch_assoc())  {			
	   if ($j>=0)  {

		$a[$j] = $row["DeliveryDate"];
		if ($row["DeliveryCount"] == $count) $c[$j] = 1; else $c[$j]=0;
		$j++;

	   } else {
		$t=0;
		for ($k=0;$k<$j;$k++)  {
			if ($a[$k] == $row["DeliveryDate"])  {
				if ($row["DeliveryCount"] == $prog) $c[$k] = 1;
				$t=1;
			}
		}
	   }
	}

	print("<ul>");
	for ($i=0;$i<$j;$i++)   {
	     if ($c[$i] == 1)
		print("<li>". $a[$i] ."</li>");
        }
	print("</ul>");


   }
   
   $date="";
   $dateErr="";
if (filter_input(INPUT_SERVER,"REQUEST_METHOD") == "POST") {
	if (empty($date)) {
    $dateErr = "Arrival Date is required";
  } else {
  
    if (preg_match($DeliveryDate,$date)) {
      $dateErr = "The selected date is not available!"; 
    }
  }
}
     $result->free();
$conn->close();}
else

{

header('Location: Login.php');

}
            ?>
              <form name="select_date" method="POST" action="insertDateDB.php" submit="return vaildate(this)">
			  Select arrival date: <input type="date" name="date" value="" />
  <span class="error" id="error"></span>
      <input type="submit" value="Update" name="update"/> 
   </form>
  </tr>      </table></td>
            </tr>
</body></html>