<!DOCTYPE html>
<html>
<head>

 
 <title> Login Page </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<Link href="style.css" type="text/css" rel="stylesheet">
 <style type="text/css">

  .red {color: red; font-style: italic;}
.text{font-size: 20px;}
 </style>
 <script type="text/javascript">


function show()  {

 
  
    
    xmlhttp=new XMLHttpRequest();
	var url = "checking.php?username="+document.getElementById("username").value+"&password="+document.getElementById("password").value;
  

  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("info").innerHTML=this.responseText;
   if(this.responseText == "success"){
        document.location.href = 'home.php';
      }
    }
  }
  xmlhttp.open("GET",url,true);
  xmlhttp.send();

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
                <td width="475" height="30" align="left" valign="middle" class="caption"><a href="home.php">Sportilife
                  <font color="9F1E30">SHOP</font></a></td>
              </tr>
            </table></td>
            </tr>

            <tr>
              <td height="32" align="center" valign="middle" background=""><table width="750" border="0" cellspacing="0" cellpadding="0">
              <tr align="center" valign="middle">
                 



   <form name="myForm"  method="POST" action="checking.php"  >
   
<p align="center" class="text">
      <label> Login Name : </label>  <input type="text" name="username" id="username" />
      <span id="infoUsername" name="infoUsername">  </span>
</p>
    
      
    <p align="center" class="text">
    <label> Password : </label>  <input type="password" name="password" id="password" />
      <span id="pwd" name="pwd">  </span>
      </p>
      <br> <div  name="info" id="info"> </div>
      
     <br/>
     <p align="center">
      <input type="button" value="Login"  onclick ="show()"/>
      
     </p>
   </form>
   <form name="newform" method="POST" action="Register.php">
   <input type="submit" value="Register"  />
  
   </form>
    </tr>
            </table></td>
        </tr>
 
</body> 
</html>