<?php
session_start();
if((isset($_SESSION["username"])) && (isset($_SESSION["password"])))

{

header('Location: profile.php');

}

else

{

header('Location: Login.php');

}

?>