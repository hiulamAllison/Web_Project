<?php
session_start();
if((isset($_SESSION["username"])) && (isset($_SESSION["password"])))

{
session_destroy();

header('Location: Logout.php');

}

else

{

header('Location: Login.php');

}

?>